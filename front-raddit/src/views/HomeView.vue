<script setup>

import NavBar from "../components/NavBarComponent.vue"
import Post from "../components/PostComponent.vue"

</script>
<template>

  <body>
    <NavBar></NavBar>

    <!-- *** TOP SUBRADDITS *** -->
    <div class="ctnr_top">
      <div class="ctnr_field topSubRaddit1"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit2"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit3"><img src="../assets/images/RadditsField.png"></div>
      <div class="ctnr_field topSubRaddit4"><img src="../assets/images/RadditsField.png"></div>
    </div>

    <!-- *** FILTERBAR *** -->
    <div class ="ctnr_filter">
      <div class="ctnr_new">🆕</div>
      <div class="ctnr_hot">🔥</div>
    </div>

    <!-- *** POSTS *** -->
    <div class="ctnr_posts">
      <Post 
      SubRadditTitle="Tout sur le Radis"
      Author="Dino"
      PostTitle="Les radis sont nos amis"
      PostBody="Découvert petit à petit par le public dans l'émission La Classe en 1991, il interprète plusieurs one-man-shows. En octobre 2000, il devient présentateur du jeu télévisé Les Z'amours, sur France 2. Il reste aux commandes du jeu pendant dix-sept ans, tout en animant d'autres émissions pour France Télévisions et en continuant de se produire sur scène. À la suite d’une blague à propos des violences faites aux femmes, lors d'une émission en direct sur C8, il est licencié par Sony Pictures Television (société de production de l'émission) en décembre 2017. La dernière présentation de l'émission avec Tex est diffusée le 31 janvier 2018. Il est remplacé dès le lendemain par Bruno Guillon.
Biographie
Enfance

Jean-Christophe Le Texier1, dit Tex, naît au Croisic, en Loire-Atlantique, le 16 avril 19601. Son père, vendeur et affineur de fromage, sa mère et ses cinq frères et sœurs emménagent à Lavau, près de Troyes, en 19611. Il joue au football à Pont-Sainte-Marie, puis à Saint-André-les-Vergers, passion qui lui permettra de devenir le parrain de l'Espérance sportive Troyes Aube Champagne en 20122.
Débuts de carrière

En 1982, il étudie au Conservatoire de Troyes3. Deux ans plus tard, il joue dans Le Théâtre de Bouvard avec Muriel Robin et Jean-Marie Bigard en passant pour la toute première fois à la télévision française3,2. Il y participe tout d'abord sous son vrai nom.

Il choisit ensuite Tex comme nom de scène[Quand ?].[réf. nécessaire]
Au théâtre

En 1992, après Les Deux Ânes et le Caveau de la République, Tex se lance dans le café-théâtre avec son deuxième spectacle : Salut Brother, qu'il joue au Movies à Paris et en tournée. En 1993, Tex joue aux Blancs Manteaux et au Point-Virgule. La cassette de son spectacle sort chez EMI. L'année suivante, il est présent à Montréal et à Montreux pour les grands festivals, tout en poursuivant ses spectacles au théâtre. En 1995, il joue au Théâtre de Dix heures à Paris et fait une tournée en France, en Suisse et en Belgique. En 1996, il se représente à nouveau au Théâtre de Dix heures avec son nouveau spectacle Énorme Dossier. En 1997, La Revue de Cuche et Barbezat (9 000 spectateurs) le fait connaître en Suisse. Il participe cette même année aux festivals de Montreux, de Saint-Gervais-les-Bains et de Vienne. Il fait à nouveau une tournée en France, en Suisse et en Belgique. En 1999, il fait une représentation au Point-Virgule à Paris, au Rouge-Gorge au Festival d’Avignon. L'année suivante, il fait une tournée nationale. En 2002, il présente son nouveau spectacle Je m’sens bien au Théâtre de la Main d'Or à Paris de février à avril, attirant 10 000 spectateurs environ. De 2003 à 2004, il revient au Théâtre de la Main d'Or avant de faire une nouvelle tournée française, suisse et belge. Il participe à de nombreux festivals à travers ces trois pays. En 2008, il écrit un nouveau one-man show : Tex in the City.

À partir du mois d'octobre 2014, il participe à la tournée des Éternels du Rire qui se produit dans toute la France.

En 2017, il joue Monsieur Nounou de Georges Feydeau, mis en scène par Luq Hamet, au théâtre Rive Gauche à Paris.

En 2022, il joue Qui vole un œuf... de Henri Guybet, mis en scène par Jean-Luc Moreau en tournée. " />
    </div>
  
  </body>
</template>
<style scoped>

.ctnr_top
{
  display: flex;
  flex-direction: row;
  max-width: 80%;
}
.ctnr_filter
{
  display: flex;
  flex-direction: row;
}
.ctnr_field
{
  align-items: center;
}

</style>