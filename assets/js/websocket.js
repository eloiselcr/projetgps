// Récupère le chemin du fichier HTML
var path = window.location.pathname;
// Récupère le nom du fichier HTML
var page = path.split("/").pop();
// Création du websocket
const socket = new WebSocket('ws://192.168.65.46:12345');
// Définition du status
const statusSocket = document.getElementById('status');
// Réponse JSON
var reponseJSON = null;

// Connexion Fermée
socket.addEventListener('close', () => {
    statusSocket.innerHTML = "Status : Fermé (Le serveur à été fermé) !";
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