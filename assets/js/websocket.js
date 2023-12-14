// Récupère le chemin du fichier HTML
var path = window.location.pathname;
// Récupère le nom du fichier HTML
var page = path.split("/").pop();
// Création du websocket
const socket = new WebSocket('ws://192.168.64.91:12345');
// Définition du status
const statusSocket = document.getElementById('status');
// Réponse JSON
var reponseJSON = null;

// Connexion Fermée
socket.addEventListener('close', () => {
    statusSocket.innerHTML = "Status : Fermé (Le serveur a été fermé) !";
});
  
// Tentative Connexion
if (socket.readyState == 0)
{
    statusSocket.innerHTML = "Status : Le socket a été créé ! En attente de connexion ...";
}

// Connexion Ouverte
socket.addEventListener('open', () => {
    statusSocket.innerHTML = "Status : Connecté !";
});

var body = document.body, 
    r = document.querySelector('#r'),
    g = document.querySelector('#g'),
    b = document.querySelector('#b'),
    w = document.querySelector('#w'),
    adress = document.querySelector('#adress'),
    r_out = document.querySelector('#r_out'),
    g_out = document.querySelector('#g_out'),
    b_out = document.querySelector('#b_out'),
    w_out = document.querySelector('#w_out');
    adress_out = document.querySelector('#adress_out');

r.addEventListener('change', function() {
  r_out.value = r.value;
}, false);

r.addEventListener('input', function() {
  r_out.value = r.value;
}, false);

g.addEventListener('change', function() {
  g_out.value = g.value;
}, false);

g.addEventListener('input', function() {
  g_out.value = g.value;
}, false);

b.addEventListener('change', function() {
  b_out.value = b.value;
}, false);

b.addEventListener('input', function() {
  b_out.value = b.value;
}, false);

w.addEventListener('change', function() {
    w_out.value = w.value;
}, false);
  
w.addEventListener('input', function() {
    w_out.value = w.value;
}, false);

adress.addEventListener('change', function() {
    adress_out.value = adress.value;
}, false);
  
adress.addEventListener('input', function() {
    adress_out.value = adress.value;
}, false);