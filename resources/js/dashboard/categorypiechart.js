import { Chart, registerables } from "chart.js";
Chart.register(...registerables);

const ctx = document.getElementById("categoryChart").getContext("2d");
const myChart = new Chart(ctx, {
  type:"doughnut",
  data:{
    labels: ["IT Equipment", "Vehicle", "Machinery", "Furniture", "Equipment"],
    datasets:[{
      label:"# of Votes",
      data: [12,19,3,20,25],
      backgroundColor:['red','blue','yellow','orange','green'],
    }]
  },
  options:{
    responsive:true,
    maintainAspectRatio:false,
    plugins:{
      title:{
        display:true,
        text:'Assets by Category',
        font:{
          size:15,
          weight:"bold"
        }
      },legend:{
        display:true,
        position:"bottom",
        align:"center"
      }
    }
  }
});
