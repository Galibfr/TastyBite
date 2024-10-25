<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contactez-Nous</h6>
                        <h2>Vous pouvez nous contacter pour des informations et Commandes</h2>
                    </div>
                    <p>Pour réserver la table vous pouvez nous contacter.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Numéro de téléphone</h4>
                                <span><a href="#">+33 751177109</a><br><a href="#">+33 751177109</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">galibfr@gmail.com</a><br><a href="#">galibfr@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="contact" action="/contact_processed" method="post" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Réservation de table</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <label for="name">Votre Nom*</label>
                                    <input name="name" type="text" id="name" placeholder="Votre Nom*" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <label for="email">Votre Adresse Email*</label>
                                    <input name="email" type="email" id="email" placeholder="Votre Adresse Email" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <label for="phone">Numéro de Téléphone*</label>
                                    <input name="phone" type="text" id="phone" placeholder="0XXXXXXXXX" required maxlength="10" pattern="0[67][0-9]{8}" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = '0' + this.value.slice(1);" onfocus="if (this.value.length === 0) { this.value = '0'; }">
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <label for="number-guests">Nombre de Personnes*</label>
                                    <select name="number-guests" id="number-guests" required>
                                        <option value="">Nombre de Personnes</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="date">Date*</label>
                                    <input name="date" id="date" type="date" required>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <label for="time">Heure*</label>
                                    <select name="time" id="time" required>
                                        <option value="">Heure</option>
                                        <option value="Breakfast">Petit Déjeuner</option>
                                        <option value="Lunch">Déjeuner</option>
                                        <option value="Dinner">Dîner</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="message">Message*</label>
                                    <textarea name="message" rows="6" id="message" placeholder="Message" required></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">Faire une Réservation</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
