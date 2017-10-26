function isBigEnough(element, index, array) {
    return element >= 10;
}
var arr1 = [12, 5, 8, 130, 44];
var arr2 = [12, 54, 8, 130, 44];

var one = arr1.every(isBigEnough);   // false
var two = arr2.every(isBigEnough); // true

console.log('one ->', one, '   ', 'two ->', two);

for (var i = 0; i < back.length; i++) {
    back[i].addEventListener('click', function() {
        backSlide();
    });
}