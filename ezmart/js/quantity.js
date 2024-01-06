const plus=document.querySelector(".plus"),
quantity=document.querySelector("#quantity"),
minus=document.querySelector(".minus");

a=1;
plus.addEventListener("click",function () {
  a=a+1;
  console.log(a);
//   b=(a<10)? "0"+a:a;
  quantity.value=a;
});

minus.addEventListener("click",function () {
  if (a>1) {
      a=a-1;
    //   b=(a<10)? "0"+a:a;
    quantity.value=a;;
  }
});