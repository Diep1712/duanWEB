const labels = ["Tháng 1", 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

const data = {
  labels: labels,
  datasets: [
    {
      label: "Đơn hàng theo tháng",
      backgroundColor: "Red",
      borderColor: "orange",
      data: [5, 7, 8, 4, 9, 10, 11, 14, 5, 7, 1, 6],
      lineTension:0.4,
    },
  ],
};
const config = {
    type: "line",
    data: data,
  };
const canvas = document.getElementById("order-month");
const chart = new Chart(canvas, config);

const data_product_sold = {
  labels: labels,
  datasets: [
    {
      label: "Số sản phẩm đã bán theo tháng",
      backgroundColor: "blue",
      borderColor: "#265073",
      data: [30, 45, 60, 123, 16, 164, 12, 3, 100, 99, 40, 50],
      lineTension:0.4,
    },
  ],
};

const config_product_sold = {
  type: "line",
  data: data_product_sold,
};

const product_sold = document.getElementById("product-sold");
const chart_product_sold = new Chart(product_sold, config_product_sold);



const data_price_year = {
    labels: labels,
    datasets: [
      {
        label: "Doanh thu theo tháng",
        backgroundColor: "#872341",
        borderColor: "#22092C",
        data: [20000000, 45000000, 60000000, 123000000, 16000000, 164000000, 12000000, 3000000, 100000000, 99000000, 40000000, 50000000],
        lineTension:0.3,
      },
    ],
  };
  
  const config_price_year = {
    type: "line",
    data: data_price_year,
  };
  
  const price_year = document.getElementById("price-year");
  const chart_price_year = new Chart(price_year, config_price_year);

  