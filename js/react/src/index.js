import React, { useState } from 'react';
import ReactDOM from 'react-dom';

import './index.css';
/*import App from './App';
import reportWebVitals from './reportWebVitals';
*/


/*

DEMO
https://reverent-boyd-aa4321.netlify.app/

*/



/*



NPM commands

NPM
node -v
npm -v
npx create-react-app hello-react --use-npm
npm start

npm run build


*/
var cart_items = [];
const specialCakeList = [
  { id: "1", name: "Red Velvet Cake", color: "#D90026", price: 1, qty: 1 },
  { id: "2", name: "Butter Cake", color: "#FF9966", price: 1, qty: 1 },
  { id: "3", name: "Pound Cake", color: "#993300", price: 1, qty: 1 },
  { id: "0", name: "Baked Flourless Cake", color: "#222", price: 1, qty: 1 }
];


ReactDOM.render(
  <App />,
  document.getElementById('root')
);

function addToCart(item) {

  //console.log(params);
  let found = cart_items.filter(el => el.id === item.id);
  if (found.length == 0) {
    cart_items = cart_items.concat({ ...item })


  } else {

    const other_items = cart_items.filter(
      el => el.id !== item.id,
    );
    cart_items = [...other_items];



  }
  //console.log(cart_items);
  // setState({ key: Math.random() });
  increment();
}
function checkout() {

}

function createNewManager() {
  var personName = null;
  do {
    var input = prompt("Write the name of the manager", "Manager");
    if (input != null) {
      var personName = escape(input.trim())
    }

  } while (personName == null || personName == "")
  return personName;
}
function SpecialtyCake({ cakes }) {

  return (
    <>
      <h1>Today's special</h1>
      <ul>
        {cakes.map(cake => (
          <li key={cake.name} style={{ color: cake.color, cursor: "pointer" }} onClick={() => addToCart(cake)}>{cake.name}</li>
        ))}

      </ul>
    </>
  );

}
function isInt(value) {
  return !isNaN(value) &&
    parseInt(Number(value)) == value &&
    !isNaN(parseInt(value, 10));
}
function GetRandom() {
  return (
    <small>Random Number : {Math.random()}</small>
  )
}
const SubTotalDisplay = ({ items }) => {

  let elements = [], subtotal = 0
  items.forEach(item => {
    var price2 = item.price
    subtotal += parseInt(price2)
  })
  return (
    <div >
      <span> Subtotal $</span>
      <span className="subtotal">{subtotal}</span>
    </div>
  );
};
var lower = 0;
var upper = 100;
var Game = [];
var hiddenNumber;
var wrong = 0;
const inputtedNumber = React.createRef();
function onNumber() {
  var guess = inputtedNumber.current.value;
  if (!isInt(guess)) {
    return;
  }
  wrong += 1;
  increment();

  //var description = InsertNewLine();
  Game.push(<br />);
  if (hiddenNumber == guess) {
    Game.push("Congratulations you did it in ", wrong, " try")
  } else if (hiddenNumber > guess) {
    Game.push("You guessed too small!")
  } else if (hiddenNumber < guess) {
    Game.push("You Guessed too high!")
  }
  if (wrong >= Math.log(upper - lower + 1, 2)) {
    Game.push("The number is " + hiddenNumber)
    Game.push(<br />);
    Game.push("Better Luck Next time!")
    Game.push(<br />);
    Game.push(<br />);
  }
}
const InsertNewLine = () => {
  return (
    <><br /></>
  );
};
const InitGame = () => {

  if (wrong == 0) {
    hiddenNumber = 30;
    wrong = 0
    Game.push("You've only " + Math.round(Math.log(upper - lower + 1, 2)) + " chances to guess the integer!");
    if (wrong >= Math.log(upper - lower + 1, 2)) {
      return
    }
  }


  return (
    <>
      <h1>Guess a number</h1>
      <section>{Game}</section>



      <button onClick={() => { onNumber() }}>number:</button>
      <input ref={inputtedNumber} type="number" id="InputtedNumber" placeholder="0"></input>

    </>
  );
}

function ViewOrder() {
  return (
    <>
      <h1>My order:</h1>
      <ul>
        {cart_items.map(product => (
          <li key={product.name} onClick={() => addToCart(product)} style={{ color: product.color, cursor: "pointer" }}>{product.name}</li>
        ))}
      </ul>
      <SubTotalDisplay items={cart_items} />
    </>
  );
}
var increment;
function App() {

  const [count, setCount] = React.useState(0)
  const [manager, setManager] = useState("Alex")
  const [status, setStatus] = useState("idle")

  increment = () => setCount(count + 1)
  return (
    <div>
      <div>
        <h1>Manager on Duty: {manager}</h1>
        <button onClick={() => setManager(createNewManager())}>New manager</button>
      </div>
      {status === "Asking about the menu" ? (
        <section>
          <SpecialtyCake cakes={specialCakeList} />

        </section>
      ) : <b></b>}
      {status === "Asking about the menu" ? (
        <section>
          <ViewOrder />

        </section>
      ) : <b></b>}
      {status === "Ordering the meal" ? (
        <section>
          <InitGame />

        </section>
      ) : <b></b>}


      <h1>Status: {status}</h1>
      <button onClick={() => setStatus("Back in 5")}>Break</button>
      <button onClick={() => setStatus("Asking about the menu")}>could I see the menu, please?</button>
      <button onClick={() => setStatus("Ordering the meal")}>Ordering the meal</button>
      <button onClick={() => setStatus("Problems")}>Problems</button>
      <button onClick={() => setStatus("Paying the bill")}>the bill, please</button>
    </div >
  )
}

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
//reportWebVitals();
