<h1> Bienvenue sur mon merveilleux site </h1>
<h3> Ce site a été conçu par Frédérik Sylvain </h3>
<br/>
<h2> L'intérêt de mon prototype d'application web </h2>
<p> Je crois que mon site serait pratique car il est possible de l'utiliser pour plusieurs choses.
Premièrement, il y a déjà un système de compte multiple intégré donc il serait pratique pour une entreprise
qui aurrait différente accès nécessaire. Par exemple, livreur et gestionnaire. Il est possible d'un coté de créer 
des commandes et d'un autre coté de créer des produits. Il manquerait simplement a implémenter un système d'inventaire
afin d'optimiser le site. Il serait aussi pratique pour de la vente en ligne car comme mentionner. Il est possible de se
connecter en tant que fournisseur (différentes entreprises utilisant le site) afin de mettre ses produits en ligne ou en tant
que client afin de commander des produits en ligne. Il manquerait a implémenter un système de paiement et de livraison
</p>

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

<h1> TP3 </h1>
<br/>
<p> - La connection en "One Page" se passe sur la page index de produit, accessible par le boutton "Menu Principal"
situé dans la barre en haut a droite. La connection permet de modifier le mot de passe mais on doit quand même se connecter
de l'ancienne façon pour les droits sur le site. Le "One page" permet seulement de modifier le mot de passe. Il faut cocher le
 "captcha" afin de pouvoir se connecter<br/>
- Le "OnePage CRUD" se situe sur la page des types de produit. Le plus simple est de se connecter en tant qu'admin et un lien est disponible sur la droite.
Pour modifier un produit, il faut pèser sur le symbole de modification afin de mettre les données dans les champs en haut. Par la suite faire les modifications
voulus et sauvegarder le tout. Pour ajouter il suffit de remplir le champ nom et ajouter.<br/>
- Les listes liées avec AngularJS sont disponible lorsque l'on crée un produit. <br/>
- Le "drag and drop" est disponible sur l'index de la page fichier. Dès l'ajout d'un fichier, la page rafraichit.<br/>

</p>

<?php echo $this->Html->link("Lien pour le coverage", ['controller' => 'webroot/coverage', 'action' => 'index.html']); ?>



