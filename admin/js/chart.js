$(document).ready(function() {

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(shares_chart);
  google.charts.setOnLoadCallback(file_upload_chart);
  google.charts.setOnLoadCallback(total_users_and_files_chart);
  google.charts.setOnLoadCallback(extensions_chart);

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

        var options = {'title':'Shares per month', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('shares_chart'));
        chart.draw(data, options);
      }
    });
  }

  function file_upload_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_file_upload.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Week', 'Uploads']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Uploads per week', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('file_upload_chart'));
        chart.draw(data, options);
      }
    });
  }

  function total_users_and_files_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_users_and_files.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Month', 'Users', 'Files']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value.user, value.file]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Total users & files', 'width':1000, 'height':350, 'colors':['#8190ff','#0a102d']};
        var chart = new google.visualization.LineChart(document.getElementById('total_users_and_files_chart'));
        chart.draw(data, options);
      }
    });
  }

  function extensions_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_extensions.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Extensions', 'Percentage']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Most popular file extensions', 'width':1000, 'height':350, 'colors':['#0a102d','#122772','#8190ff','#c2cad0','#424866','#333333']};
        var chart = new google.visualization.PieChart(document.getElementById('extensions_chart'));
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
