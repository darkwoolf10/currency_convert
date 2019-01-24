var app = new Vue({
  el: '#app',
  data: {
    result: '',
    currencies: {
      EUR: 'Euro',
      RUB: 'RUB'
    }
  },
  methods: {
    getResult: function () {
      var self = this;
      $.ajax({
        type:"GET",
        contentType: "application/json",
        url: 'convertor.php',
        data: {
          currency: $("#currency option:selected").val(),
          amount: $('#amount').val()
        },
        dataType: 'json',
        success: function (data) {
          self.result = data.result;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log("Status: " + textStatus);
          console.log("Error: " + errorThrown);
        }
      });
    }
  }
});