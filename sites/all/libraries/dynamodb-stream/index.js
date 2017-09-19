var aws = require('aws-sdk')
aws.config.loadFromPath('./config.json');
var DynamoDBStream = require('dynamodb-stream')
var schedule = require('tempus-fugit').schedule
var deepDiff = require('deep-diff').diff

var socket_array = [];

var fs = require('fs')
    , http = require('http')
    , socketio = require('socket.io');
    
var server = http.createServer(function(req, res) {
    res.writeHead(200, { 'Content-type': 'text/html'});
    res.end(fs.readFileSync(__dirname + '/index.html'));
}).listen(4040, function() {
    console.log('Listening at: http://localhost:4040');
});

 
var pk = 'applicationId '
var ddb = new aws.DynamoDB()
var ddbStream = new DynamoDBStream(new aws.DynamoDBStreams(), 'arn:aws:dynamodb:us-east-1:432070650247:table/wiphy-application-dev/stream/2017-04-12T14:39:23.375')
 
var localState = {}

socketio.listen(server).on('connection', function (socket) {
	socket_array.push(socket);
    socket.on('message', function (msg) {
        console.log('Message Received: ', msg);
        socket.broadcast.emit('message', msg);
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
		console.log(data);
	})
	 
	ddbStream.on('remove record', function (data) {
		delete localState[data.id]
	})
	 
	ddbStream.on('modify record', function (newData, oldData) {
		console.log(newData);
		socket_array.forEach(function(socket) {
				socket.emit('message', newData);
		});	
		
		
		var diff = deepDiff(oldData, newData)
		if (diff) {
			// handle the diffs 
		}
	})
	 
	ddbStream.on('new shards', function (shardIds) {})
	ddbStream.on('remove shards', function (shardIds) {})
	 
    
});

 



