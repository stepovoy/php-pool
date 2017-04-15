$(document).ready(function(){
    $.ajax({
        url: 'select.php',
        success: function (response) {
            var arr = JSON.parse(response);
            if (Array.isArray(arr) && arr[0] != '') {
                for (i = 0; i < arr.length; i++) {
                    if (arr[i] != '') {
                        tmp = arr[i].split(';');
                        add_old(tmp[1]);
                    }
                }
            }
        }
        });
})

function ask() {
    var name = prompt("Please enter a name of new TO DO:");
    if (name != '') {
        add(name);
    }
}

function add(name) {
    if (name != '') {
        var new_item = $('#ft_list').prepend($('<div>' + name + '</div>').click(del));
    }
    $.ajax({
        type: "GET",
        url: "insert.php?" + name + "=" + name
    });
}

function add_old(name) {
  if (name != '') {
      var new_item = $('#ft_list').prepend($('<div>' + name + '</div>').click(del));
  }
}

function del() {
    if (confirm("Do you really want to delete this TO DO?")) {
        this.remove();
        delCSV(this.innerHTML);
    }
}

function delCSV(name) {
    $.ajax({
        type: "GET",
        url: "delete.php?" + name + "=" + name,
        success: function () {}
    });
}