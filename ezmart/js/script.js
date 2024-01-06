var tabbuttons=document.querySelectorAll(".tablink");
for (let i = 0; i < tabbuttons.length; i++) {
    tabbuttons[i].addEventListener("click",function () {
        tab=this.dataset.tab;
        tabcontent=document.getElementById(tab); 
        
        var alltabcontent=document.querySelectorAll('.tabcontent');
        var alltabbutton=document.querySelectorAll('.tablink');
        
        for (let j = 0; j < alltabcontent.length ; j++) {
            alltabcontent[j].style.display="none";
        }
        for (let k = 0; k < alltabbutton.length ; k++) {
            alltabbutton[k].classList.remove("active");
        }
        
        tabcontent.style.display="block";
        this.classList.add('active');
    });
    
}

document.querySelector(".tablink").click();

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


