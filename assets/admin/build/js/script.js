// // ambil element yang dibutuhkan
// var livesearch = document.getElementById("livesearch");
// var lives_content = document.getElementById("lives_content");

// // tambahkan event ketikan keywork ditulis
// livesearch.addEventListener("keyup", function () {
//   //buat object ajax
//   var xhr = new XMLHttpRequest();

//   // cek kesiapan ajax
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       lives_content.innerHTML = xhr.responseText;
//       console.log("ok");
//     }
//   };

//   // ekse ajax
//   xhr.open(
//     "GET",
//     "../../../../../adminpages/produk/ajax_produk.php?keyword=" +
//       livesearch.value,
//     true
//   );
//   xhr.send();
// });

// $(document).ready(function () {
//   $("#livesearch").keyup(function () {
//     $.ajax({
//       type: "POST",
//       url: "../../../../../adminpages/produk/ajax_produk.php",
//       data: {
//         search: $(this).val(),
//       },
//       cache: false,
//       success: function (data) {
//         $("#lives_content").html(data);
//       },
//     });
//   });
// });
