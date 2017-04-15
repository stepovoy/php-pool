window.onload = function() {
    var arr = document.cookie.split(';');
    if (Array.isArray(arr) && arr[0] != '') {
        for (i = 0; i < arr.length; i++) {
            tmp = arr[i].split('=');
            add(tmp[1]);
        }
    }

}

function ask() {
    var name = prompt("Please enter a name of new TO DO:");
    if (name != '') {
        add(name);
    }
}

function add(name) {
    if (name != '' && name != 'null') {
        var node = document.createElement("DIV");
        var textnode = document.createTextNode(name);
        node.appendChild(textnode);
        node.addEventListener("click", del);
        node.addEventListener("click", function() { delCookies(name); });
        document.getElementById("ft_list").insertBefore(node, document.getElementById("ft_list").firstChild);
        addCookies(name);
    }

}

function del() {
    if (confirm("Do you really want to delete this TO DO?")) {
       this.parentNode.removeChild(this);
    }
}

function addCookies(name) {
    document.cookie = name + "=" + name + ";";
}

function delCookies(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}