<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Calculate me! - A calculator made my me</title>



  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap');
html, body {
  height: 100%;
  width: 100%;
  font-family: 'Roboto', sans-serif; 
}

.contain{
            width: 100%;
            height: 100vh;
            background-color: #d1dbeb;
            display:flex;
            align-items:center;
            justify-content:center;
        }

.button{
  width: 66px;
  padding: 20px;
  margin: 0 3px;
  border: 2px solid black;
  border-radius: 9px;
  cursor: pointer;
}

.row{
  margin: 8px 0;
  display:flex;
}

.num {
  display:flex;
  color:grey;

}

.row input{
  width: 291px;
  font-size: 30px;
  text-align: right;
  flex:1;
    margin: 5px;
    padding: 10px 0px;
    border: 2px solid black;
    border-radius: 5px;
}
    </style>
  
</head>

<body>
  <div class="contain">
  <div class="container flex flex-col items-center mx-auto m-w-20">
    <div class="row">
      <input type="text" id="result" readonly>
    </div>
    <div class="row">
      <button class="button" onclick="clearDisplay()">C</button>
      <button class="button" onclick="deleteDigit()">D</button>
      <button class="button" onclick="appendInput('%')">%</button>
      <button class="button" onclick="appendInput('/')">/</button>
    </div>
    <div class="row">
      <div class="num">
      <button class="button" onclick="appendInput('7')">7</button>
      <button class="button" onclick="appendInput('8')">8</button>
      <button class="button" onclick="appendInput('9')">9</button></div>
      <button class="button" onclick="appendInput('*')">*</button>
    </div>
    <div class="row">
    <div class="num">
      <button class="button" onclick="appendInput('4')">4</button>
      <button class="button" onclick="appendInput('5')">5</button>
      <button class="button" onclick="appendInput('6')">6</button></div>
      <button class="button" onclick="appendInput('-')">-</button>
    </div>
    <div class="row">
    <div class="num">
      <button class="button" onclick="appendInput('1')">1</button>
      <button class="button" onclick="appendInput('2')">2</button>
      <button class="button" onclick="appendInput('3')">3</button></div>
      <button class="button" onclick="appendInput('+')">+</button>
    </div>
    <div class="row">
    <div class="num">
      <button class="button" onclick="appendInput('00')">00</button>
      <button class="button" onclick="appendInput('0')">0</button>
    </div>
      <button class="button" onclick="appendInput('.')">.</button>
      <button class="button" onclick="calculate()">=</button>
    </div>
  </div>
</div>
<script>
        let input = '';
let result = document.getElementById('result');

function appendInput(value) {
    if (isOperator(value) && isOperator(getLastCharacter())) {
        // Replace the last operator with the new one
        input = input.slice(0, -1) + value;
    } else {
        input += value;
    }
    result.value = input;
}

function calculate() {
    try {
        let calculatedResult = eval(input);
        result.value = calculatedResult;
        input = '';
    } catch (error) {
        result.value = 'Error';
    }
}

function clearDisplay() {
    input = '';
    result.value = '';
}

function deleteDigit() {
    input = input.slice(0, -1);
    result.value = input;
}

function isOperator(value) {
    return value === '+' || value === '-' || value === '*' || value === '/';
}

function getLastCharacter() {
    return input.slice(-1);
}

    </script>
</body>

</html>