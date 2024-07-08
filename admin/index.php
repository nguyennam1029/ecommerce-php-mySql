
<?php
session_start();
if(!isset($_SESSION['dangnhapad']))
{
    header('Location:login_ad.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .fill-primary {
        fill: rgb(60, 80, 224);
      }
      .text-meta-3 {
        --tw-text-opacity: 1;
        color: rgb(16 185 129 / var(--tw-text-opacity));
      }
      .fill-meta-3 {
        fill: rgb(16, 185, 129);
      }
    </style>
  </head>
  <body>
    <div class="">
     
 <?php
    include("config/connect.php");
    include("modules/nav.php");
    include("modules/aside.php");
  
    ?>
      

      <div class="p-4 sm:ml-64 mt-16">
 <?php
    include("modules/main.php");

    ?>
  
      
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
      const options = {
        colors: ["#1A56DB", "#FDBA8C"],
        series: [
          {
            name: "Organic",
            color: "#1A56DB",
            data: [
              { x: "Mon", y: 231 },
              { x: "Tue", y: 122 },
              { x: "Wed", y: 63 },
              { x: "Thu", y: 421 },
              { x: "Fri", y: 122 },
              { x: "Sat", y: 323 },
              { x: "Sun", y: 111 },
            ],
          },
          {
            name: "Social media",
            color: "#FDBA8C",
            data: [
              { x: "Mon", y: 232 },
              { x: "Tue", y: 113 },
              { x: "Wed", y: 341 },
              { x: "Thu", y: 224 },
              { x: "Fri", y: 522 },
              { x: "Sat", y: 411 },
              { x: "Sun", y: 243 },
            ],
          },
        ],
        chart: {
          type: "bar",
          height: "320px",
          fontFamily: "Inter, sans-serif",
          toolbar: {
            show: false,
          },
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 8,
          },
        },
        tooltip: {
          shared: true,
          intersect: false,
          style: {
            fontFamily: "Inter, sans-serif",
          },
        },
        states: {
          hover: {
            filter: {
              type: "darken",
              value: 1,
            },
          },
        },
        stroke: {
          show: true,
          width: 0,
          colors: ["transparent"],
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: -14,
          },
        },
        dataLabels: {
          enabled: false,
        },
        legend: {
          show: false,
        },
        xaxis: {
          floating: false,
          labels: {
            show: true,
            style: {
              fontFamily: "Inter, sans-serif",
              cssClass: "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          show: false,
        },
        fill: {
          opacity: 1,
        },
      };

      if (
        document.getElementById("column-chart") &&
        typeof ApexCharts !== "undefined"
      ) {
        const chart = new ApexCharts(
          document.getElementById("column-chart"),
          options
        );
        chart.render();
      }

      const getChartOptions = () => {
        return {
          series: [52.8, 26.8, 20.4],
          colors: ["#1C64F2", "#16BDCA", "#9061F9"],
          chart: {
            height: 420,
            width: "100%",
            type: "pie",
          },
          stroke: {
            colors: ["white"],
            lineCap: "",
          },
          plotOptions: {
            pie: {
              labels: {
                show: true,
              },
              size: "100%",
              dataLabels: {
                offset: -25,
              },
            },
          },
          labels: ["Direct", "Organic search", "Referrals"],
          dataLabels: {
            enabled: true,
            style: {
              fontFamily: "Inter, sans-serif",
            },
          },
          legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return value + "%";
              },
            },
          },
          xaxis: {
            labels: {
              formatter: function (value) {
                return value + "%";
              },
            },
            axisTicks: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
        };
      };

      if (
        document.getElementById("pie-chart") &&
        typeof ApexCharts !== "undefined"
      ) {
        const chart = new ApexCharts(
          document.getElementById("pie-chart"),
          getChartOptions()
        );
        chart.render();
      }
    </script>
  </body>
</html>
