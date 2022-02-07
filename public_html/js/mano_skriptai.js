//
// let masyvas = ['a', 'b', 5, 8, 'Jonas', true];
// let arr = [];
//
// masyvas[0] = 'Tautvydas';
// masyvas[3] = 'Dulskis';
//
// arr.push('kestas');
// arr[5] = 'Petras';
//
// for (let i = 0; i < 3; ++i) {
//     masyvas.unshift(i+'_elem');
// }
// for (let i = 0; i < 3; ++i) {
//     masyvas.push(i+'_elem');
// }

// for (let h = 0; h < masyvas.length; ++h) {
//     let elementas = masyvas[h];
//     console.log('ELEM: ' + elementas);
// }
//
// let j = 0;
// while(j <= masyvas.length - 1) {
//     let elementas = masyvas[j];
//     console.log('WHILE ciklas ' + j +  '=' + elementas);
//     j++;
// }

// let z = 0;
// do {
//     let elementas = arr[z];
//     console.log('WHILE ciklas ' + z +  '=' + elementas);
//     z++;
// } while (z <= arr.length - 1);



let asmuo = {
    akiuSpalva: 'melyna',
    amzius: 0,
    ugis: 40
};
console.log(asmuo);

// ....

asmuo.amzius = 1;
asmuo.ugis = 50;

console.log(asmuo);