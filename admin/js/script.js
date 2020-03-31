$(document).ready(function() {

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(shares_chart);

  function shares_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_shares_data.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Month', 'Shares']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Total shares per month', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('shares_chart'));
        chart.draw(data, options);
      }
    });
  }

});














// google.charts.load('current', {'packages':['corechart']});
// google.charts.setOnLoadCallback(shares_chart);
// // google.charts.setOnLoadCallback(chart);
//
// // Draw the shares chart
// function shares_chart() {
//   $.ajax({
//     type : 'post',
//     url : 'admin/php/chart_shares_data.php',
//     dataType : 'json',
//     success : (db_data) =>
//     {
//       $('main').append(db_data[0].march);
//       console.log(db_data);
//       // data = db_data;
//
//       var dataArray = [['Month', 'Shares']];
//
//       for (var i = 0; i < db_data.length; i++) {
//         console.log(db_data[i]);
//         dataArray.push(['test', db_data[0].month1]);
//       }
//
//       var data = google.visualization.arrayToDataTable(dataArray);
//       // var data = google.visualization.arrayToDataTable([
//       //   ['Januari', 'Shares'],
//       //   ['Januari', 10],
//       //   ['Februari', 8],
//       //   ['March', 2],
//       //   ['April', 2],
//       //   ['May', 2],
//       //   ['June', 2],
//       //   ['July', 8],
//       //   ['test', db_data[0].march]
//       // ]);
//
//       // var result1, result2, message;
//
//       // for(var i = 0; i < db_data.length; i++) {
//       //   result1 = db_data[i].result1;
//       //   result2 = db_data[i].result2;
//       //   message = db_data[i].message;
//       //   $('main').append().html(result1);
//       // }
//
//       var options = {'title':'My Average Day', 'width':550, 'height':400};
//       var chart = new google.visualization.ColumnChart(document.getElementById('shares_chart'));
//       chart.draw(data, options);
//     }
//   });
// }
