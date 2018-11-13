<h1> Bienvenue sur mon merveilleux site </h1>
<h3> Ce site a été conçu par Frédérik Sylvain </h3>
<br/><br/>
<h4>En tant que Visiteur</h4>
<p>Il est possible de: <br/>
-voir la liste des produits (Tout les utilisateurs peuvent la voir)</p>

<h4>En tant que Client non confirmé par email</h4>
<p>Il est possible de :<br/>
- voir les informations des produits ainsi que de son compte<br/>
- renvoyer un courriel afin de confirmer son compte</p>

<h4>En tant que Client confirmé par email</h4>
<p>Il est possible de :<br/>
-faire toutes les actions du client non confirmé<br/>
-de modifier les informations de son compte<br/>
-commander des produits<br/>
-consulter ses commandes et les modifier</p>

<h4>En tant que Magasin non confirmé par email</h4>
<p>Il est possible de voir :<br/>
-la liste de ses produits<br/>
-ajouter des produits au site<br/>
-ajouter des photos<br/>
-ajouter des types de produit<br/>
-consulter les informations de son compte.<br/>
-renvoyer un courriel afin de confirmer son compte</p>


<h4>En tant que Magasin confirmé par email</h4>
<p>Il est possible de :
-faire toutes les actions du magasin non confirmé<br/>
-modifier les informations de son compte<br/>
-modifier les produits et les types de produit<br/>
-effacer ou restorer des produits.</p>

<h4>En tant qu'administrateur</h4>
<p> Il est possible de faire toutes les actions exceptées deux (les options ne sont pas disponible sur le site): <br/>
 -créer un compte client (Car il est possible d'en créer un sans se connecter)<br/>
 -créer une commande client (L'admin ne peux pas forcer la commande d'un produit à un client) <br/>
 Mail : admin@admin.com <br/>
 Mot de passe : admin<br/>
</p>
<?php echo $this->Html->image("bd.PNG", ["alt" => "Base de données" ]);?>

<h2> TP2 <h2>
<p> Afin d'avoir accès a toute les fonctionnalité, je vous conseil de vous connecter en tant qu'admin.<br/>
Pour le one page app, je l'ai completer sur la table des types de produits.<br/>
Le test du modele se fait sur la table products, les test du controleur sont fait sur Stores<br/>
Liste liées et l'autocomplete se fait dans la page add des produits (liste: country, pays ; autocomplete: productType)<br/>
Interface de routage admin est disponible pour la page products<br/>
L'affichage en document pdf se fait aussi dans l'index de products<br/>
 <a href="../../ProjectFrederik/coverage/index.html"> Lien pour le coverage </a>
