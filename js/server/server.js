var express = require("express");
var bodyParser = require ("body-parser");

const { Server } = require("http");
var app = express();

var http = require("http").Server(app);
var io = require ("socket.io")(http);

app.use(express.static(__dirname));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:false}));

var messages = [
    {name:"Tim", message: "Hi"},
    {name:"Jane", message: "Hello"}
]

app.get("/messages", (req,res) => {
    res.send(messages);
    console.log("get")
})
app.post("/messages", (req,res) => {
    console.log("post")
    io.emit("message",req.body);
    console.log(req.body);
    messages.push(req.body);
    res.sendStatus(200);
    console.log("-")
});

app.listen(3000);
io.on("connection", (socket) => {
    console.log("a user connected");
})

var server = http.listen(3040,()=>{
    console.log("server is listening on port ", server.address().port)
} );

// http://localhost:3040/reply.html