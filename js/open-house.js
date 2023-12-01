var i = 0;
var text = "SELAMAT DATANG DI OPEN HOUSE XI PPLG A";
var waktuAnimasi = 100;
var tempatText = document.getElementById("tempatText");

function munculkanText() {
    if (i <= text.length) {
        tempatText.textContent += text.charAt(i);
        i++;
        setTimeout(munculkanText, waktuAnimasi);
    } else {
        setTimeout(hapusText, 1000);
    }
}

function hapusText() {
    if (i > 0) {
        tempatText.textContent = tempatText.textContent.slice(0, -1);
        i--;
        setTimeout(hapusText, waktuAnimasi / 2);
    } else {
        i = 0;
        setTimeout(munculkanText, waktuAnimasi);
    }
}

munculkanText();