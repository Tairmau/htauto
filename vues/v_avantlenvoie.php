<div class="avantveille">
    <p>Veuillez nous joindre votre email afin de vous envoyer les informations pour la visite de votre futur véhicule</p>
    <form action="index.php?uc=reservation&action=sendmail&id=<?php echo $id;?>" method="POST" >
        <select name="date">
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
            <option value="Samedis">Samedis</option>
        </select>
        <select name="heure">
            <option value="9h-10h">9h-10h</option>
            <option value="13h-14h">13h-14h</option>
            <option value="15h-16h">15h-16h</option>
        </select>
        <input type="text" placeholder="Email" name="email">
        <button type="submit">Envoyer</button>
    </form>
</div>