// npm install lodash
// npm install -g nodemon 
// npm init 
// npm install -s express
// npm install -s body-parser
// npm install -s socket.io

// npm install -s mongoose
// npm init --yes

var _ = require ("lodash");
console.log(_.random(1,100));
var data =require ("./data.json");

console.log(data.name);

var fs = require("fs");

fs.readFile("./data.json","utf-8" , (err,data)=> {
    // data is string
    console.log(data);

    var data2 = JSON.parse(data);

    console.log(data2.name);
});




fs.readdir ("c:/", (err,data) => {console.log (data);})


var dataToWrite = {
    name: "Bob"
};
fs.writeFile("data.json", JSON.stringify(dataToWrite), (err)=> {
   console.log("write finished", err) 
});


// Framework
// socket.io 2.0


