var aws = require('aws-sdk')
aws.config.loadFromPath('./config.json');
var DynamoDBStream = require('dynamodb-stream')
var schedule = require('tempus-fugit').schedule
var deepDiff = require('deep-diff').diff

 
var pk = 'applicationId'
var ddb = new aws.DynamoDB()
var ddbStream = new DynamoDBStream(new aws.DynamoDBStreams(), 'arn:aws:dynamodb:us-east-1:432070650247:table/wiphy-application-dev/stream/2017-04-12T14:39:23.375')
 
var localState = {}
 


// fetch stream state initially 
ddbStream.fetchStreamState(function (err) {
    if (err) {
        console.error(err)
        return process.exit(1)
    }
    
    // fetch all the data 
    ddb.scan({ TableName: 'telos-application-dev' }, function (err, results) {
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
	console.log(newData.applicationData.biographic.address);
	console.log(oldData);
	
    var diff = deepDiff(oldData, newData)
    if (diff) {
        // handle the diffs 
		console.log("Data has changed.");
    }
})
 
ddbStream.on('new shards', function (shardIds) {})
ddbStream.on('remove shards', function (shardIds) {})
 
