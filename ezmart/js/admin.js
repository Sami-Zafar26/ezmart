// edits = document.getElementsByClassName("edit");
// Array.from(edits).forEach(function (element) {
//   element.addEventListener("click", function (e) {
//     tr = e.target.parentNode.parentNode;
//     console.log(tr);
//     pimage = tr.getElementsByTagName("td")[0].querySelector("img").getAttribute("src");
//     console.log(pimage);
//     pname = tr.getElementsByTagName("td")[1].innerText;
//     pdescription = tr.getElementsByTagName("td")[2].innerText;
//     pprice = tr.getElementsByTagName("td")[3].innerText;
//     pcategory = tr.getElementsByTagName("td")[4].innerText;

//     product_image.src = pimage;
//     product_name.value = pname;
//     product_description.value = pdescription;
//     product_price.value = pprice;
//     product_category.value = pcategory;
//     sredit.value = e.target.id;
//     console.log(product_price);

//     $('#editmodal').modal('toggle');
//   });
// });
edits = document.getElementsByClassName("edit");
Array.from(edits).forEach(function (element) {
  element.addEventListener("click", function (e) {
    tr = e.target.parentNode.parentNode;
    console.log(tr);
    pimage = tr.getElementsByTagName("td")[0].querySelector("img").getAttribute("src");
    console.log(pimage);
    pname = tr.getElementsByTagName("td")[1].innerText;
    pdescription = tr.getElementsByTagName("td")[2].innerText;
    pprice = tr.getElementsByTagName("td")[3].innerText;
    pcategory = tr.getElementsByTagName("td")[4].innerText;

    document.getElementsByClassName("eimage")[0].src = pimage;
    document.getElementById("product_image").src = pimage;
    document.getElementById("product_name").value = pname;
    document.getElementById("product_description").value = pdescription;
    document.getElementById("product_price").value = pprice;
    document.getElementById("product_category").value = pcategory;
    document.getElementById("sredit").value = e.target.id;
    console.log(product_price);

    $('#editmodal').modal('toggle');
  });
});


deletes= document.getElementsByClassName("delete");
Array.from(deletes).forEach(function (elements) {
    elements.addEventListener("click",function (e) {
        srdelete.value=e.target.id;
        $('#deletemodal').modal('toggle');
    });
});