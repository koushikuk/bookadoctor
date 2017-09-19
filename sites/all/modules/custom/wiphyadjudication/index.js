var aws = require('aws-sdk')
aws.config.loadFromPath('./config.json');
var DynamoDBStream = require('dynamodb-stream')
var schedule = require('tempus-fugit').schedule
var deepDiff = require('deep-diff').diff

var socket_array = [];
var updated_record_array = [];

var fs = require('fs')
    , http = require('http')
    , socketio = require('socket.io');
    
var server = http.createServer(function(req, res) {
    res.writeHead(200, { 'Content-type': 'text/html'});
    res.end(fs.readFileSync(__dirname + '/index.html'));
}).listen(9090, function() {
    console.log('Listening at: http://10.62.2.151:9090');
});

 
var pk = 'applicationId'
var ddb = new aws.DynamoDB()
var ddbStream = new DynamoDBStream(new aws.DynamoDBStreams(), 'arn:aws:dynamodb:us-east-1:432070650247:table/wiphy-application-dev/stream/2017-04-12T14:39:23.375')
 
var localState = {}

socketio.listen(server).on('connection', function (socket) {
	socket_array.push(socket);
    socket.on('message', function (msg) {
        console.log('Message Received: ', msg);
        socket.broadcast.emit('message', msg);
    });
    socket.on('disconnect', function(){
		for(var i in socket_array) {
			if(socket_array[i].id == socket.id) {
			   delete socket_array[i];
			}
		}
		
		socket_array = socket_array.filter(function(){return true;});
        console.log( socket.name + ' has disconnected from the chat.' + socket.id);
    });
    
    
	 
    
});


// fetch stream state initially 
ddbStream.fetchStreamState(function (err) {
	if (err) {
		console.error(err)
		return process.exit(1)
	}
	
	// fetch all the data 
	ddb.scan({ TableName: 'wiphy-application-dev' }, function (err, results) {
		localState = // parse result and store in localSate 
		
		// do this every 1 minute, starting from the next round minute 
		schedule({ minute: 1 }, function (job) {
			ddbStream.fetchStreamState(job.callback())
		})
	})    
})
 
ddbStream.on('insert record', function (data) {
	socket_array.forEach(function(socket) {
		socket.emit('message', data);
	});
})
 
ddbStream.on('remove record', function (data) {
	delete localState[data.id]
})
 
ddbStream.on('modify record', function (newData, oldData) {
	console.log(newData);
	
	socket_array.forEach(function(socket) {
		socket.emit('message', newData);
	});
	
	

	
	/*socket_array.forEach(function(socket) {
			curr_timestamp = Math.floor(Date.now() / 1000);
			if(updated_record_array[newData.streamId] == undefined){
				updated_record_array[newData.streamId] = curr_timestamp;
				socket.emit('message', newData);
				
			}else{
				app_timestamp_diff = curr_timestamp - updated_record_array[newData.streamId];
				console.log(app_timestamp_diff);
				if(app_timestamp_diff > 10){
					updated_record_array[newData.streamId] = curr_timestamp;
					socket.emit('message', newData);
					
				}
				
				if(app_timestamp_diff > 1000){
					delete updated_record_array[newData.streamId];
				}
			}
			
			
	});	*/
	
	
	var diff = deepDiff(oldData, newData)
	if (diff) {
		// handle the diffs 
	}
})
 
ddbStream.on('new shards', function (shardIds) {})
ddbStream.on('remove shards', function (shardIds) {})
 



