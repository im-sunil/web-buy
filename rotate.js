var alphabets = {
    ascii : ['!','"','#','$','%','&',"'",'(',')','*','+',',','-','.','/',
        '0','1','2','3','4','5','6','7','8','9',':',';','<','=','>','?','@',
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q',
        'R','S','T','U','V','W','X','Y','Z','[','\\',']','^','_','`',
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q',
        'r','s','t','u','v','w','x','y','z','{','|','}','~']
};

function rotat3(str){
    var map = "!\"#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~";
    return rotateCustom(str, map, 3);
}

function rotateCustom(str, map, shift){
    var output = '';
    var i, j, c, len = map.length;
    if (shift < 0) return rotateCustom(str, map, shift + len);
    for(i = 0; i < str.length; i++) {
        c = str.charAt(i);
        j = map.indexOf(c);
        if (j >= 0) {
            c = map.charAt((j + shift) % len);
            //c = map.charAt((j + len / 2) % len)
        }
        output = output + c
    }
    return output;
}
console.log(rotat3("eva",3));
console.log(rotat3("bagdesunil786@gmail.com"));
console.log( );


 var shift = (alphabets.ascii.length - parseInt(3,10));
 console.log("shift", shift);
console.log(rotateCustom("edjghvxqlo:;9Cjpdlo1frp", alphabets.ascii.join(''), shift) );

console.log(rotateCustom("hyd", alphabets.ascii.join(''), shift) );

function (argument) {
    // body...
}
