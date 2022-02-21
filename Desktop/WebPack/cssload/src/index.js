import "./style.css";

import multiply from './multiply';
import sum from './sum';

const totalMultiply = multiply(5, 3);
const totalSum = sum(5, 3);

console.log(`Product of 5 and 3 = ${totalMultiply}`);
console.log(`Sum of 5 and 3 = ${totalSum }`);
document.write(`Product of 5 and 3 = ${totalMultiply}`);
document.write("<br>");
document.write(`Sum of 5 and 3 = ${totalSum}`);