<?php include 'header.php'; ?>

<div class="title"><h1>CONTACT US</h1></div>


    <div id="contact_c">

        <div id="contact_title">

            <h1>CONTACT US</h1>

        </div>

        <h3>If you are interested in becoming a Et Spork dealer, email us at support@etspork.com.
        </h3>

        <div id="contact_form">
            <form action="index.php?action=deal" method="post">
                <label>Your Name:</label><br>
                <input type="text" name="name" placeholder="Name"><br>
                <label>Your Email (required):</label><br>
                <input type="text" name="email" placeholder="Email"><br>
                <label>Your Phone Number:</label><br>
                <input type="text" name="phone_number" placeholder="Phone Number"><br>
                <input class="submit" type="submit" value="Submit"> <div id="contact_output"><?php if (isset($name)) { echo '** Thanks ' . htmlspecialchars($name) . ' for contacting us. We\'ll get back to you soon!'; }?></div>
            </form>
        </div>
        
        

        <h3>If you have any questions or comments, please feel free to reach out to us using the form below:</h3>

        <div id="contact_form">
            <form action="index.php?action=question" method="post">
                <label>Your Name:</label><br>
                <input type="text" name="name2" placeholder="Name"><br>
                <label>Your Email: (required):</label><br>
                <input type="text" name="email2" placeholder="Email"><br>
                <label>Message:</label><br>
                <textarea name="message" placeholder="Enter your message here..."></textarea><br>
                <input class="submit" type="submit" value="Send a message">
                
                <div id="contact_output"><?php if (isset($name2)) { echo '** Thanks ' . htmlspecialchars($name2) . ' for contacting us. We\'ll get back to you soon!'; }?></div>
            </form>
        </div>
    </div>

<?php include 'footer.php'; ?>;

</body>

</html>
