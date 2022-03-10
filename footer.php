
  <?php   if(isset($_POST['message']))
  mail("Zkim.ysf@gmail.com" , "Message pour contacter votre botique" , $_POST['message']);?>
</main>
  <footer >
      <span>Télécharger l'appliaction</span>
          <div class="footer">
              <img src="image/playstore.png" alt="">
              <img src="image/appstore.png" alt="">
          </div>
         <div class="footer2">
             <p><img src="image/mss.png" alt="">Contactez-nous </p>
             <form action="" method="POST">
                   <textarea name="message" id="" cols="30" rows="10"></textarea>
             <button type="submit">Envoyer</button>
             </form>
       
         </div>
  
  </footer>
    
  </body>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="script/app.js"></script>
      <script src="script/script.js"></script>
  
  </html>