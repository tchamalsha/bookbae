var ctx = document.getElementById('myChart');
var ctx2 = document.getElementById('myChart2');

const datapoints = [0, 20, 80, 60, 30, 120];
const DATA_COUNT = datapoints.length;
const labels = [];
for (let i = 0; i < DATA_COUNT; ++i) {
  labels.push(i.toString());
}

function chart1(_dates, _values){
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: _dates,
          datasets: [
              {
                  label: 'Earnings',
                  data: _values,
                  borderColor: '#87574b',
                  backgroundColor: '#87574b',
                  fill: false,
                  cubicInterpolationMode: 'monotone',
                  tension: 0.4,
                  radius:5
              }
          ]
      },
      options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Income'
        },
        legend: {
          display: false
        }
      },
      interaction: {
        intersect: false,
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true
          }
        },
        y: {
          display: true,
          grace: '5%',
          title: {
            display: true,
            text: 'Income (Rs.)'
          },
          // suggestedMax: 200
        }
      }
    }
  });
}

function chart2(_dates, _values){
  var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: _dates,
      datasets: [
        {
          label: 'Orders',
          data: _values,
          borderColor: '#87574b',
          backgroundColor: '#87574b',
          fill: false,
          cubicInterpolationMode: 'monotone',
          tension: 0.4,
          radius:5
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Orders chart'
        },
        legend: {
          display: false
        }
      },
      interaction: {
        intersect: false,
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true
          }
        },
        y: {
          display: true,
          grace: '5%',
          title: {
            display: true,
            text: 'Orders'
          },
          suggestedMin: 0,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
}

//validate add admin form
function validateAddAdminForm() {
  let password = document.forms["addAdminForm"]["password"].value;
  let cPassword = document.forms["addAdminForm"]["cPassword"].value;
  if (password.length < 8) {
    alert("Password must have adleast 8 charactors!");
    return false;
  }
  if (password != cPassword) {
    alert("Confirm password did not matched!");
    return false;
  }
} 