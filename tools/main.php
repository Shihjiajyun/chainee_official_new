<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<section class="game-section">
    <div class="owl-carousel custom-carousel owl-theme">
        <div class="item active" style="background-image: url(./img/lesson.jpg);">
            <div class="item-desc">
                <h3>課程1</h3>
                <p>Dota 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                    Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url(./img/lesson1.jpg);">
            <div class="item-desc">
                <h3>The Witcher 3</h3>
                <p>The Witcher 3 is a multiplayer online battle arena by Valve. The game is a sequel to Defense
                    of the Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url(./img/lesson2.jpg);">
            <div class="item-desc">
                <h3>RDR 2</h3>
                <p>RDR 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                    Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url(./img/lesson.jpg);">
            <div class="item-desc">
                <h3>PUBG Mobile</h3>
                <p>PUBG 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                    Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url(./img/lesson1.jpg);">
            <div class="item-desc">
                <h3>Fortnite</h3>
                <p>Battle royale where 100 players fight to be the last person standing. which was a community-created mod
                    for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url(./img/lesson2.jpg);">
            <div class="item-desc">
                <h3>Far Cry 5</h3>
                <p>Far Cry 5 is a 2018 first-person shooter game developed by Ubisoft.
                    which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
    </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(".custom-carousel").owlCarousel({
        autoWidth: true,
        loop: true
    });
    $(document).ready(function() {
        $(".custom-carousel .item").click(function() {
            $(".custom-carousel .item").not($(this)).removeClass("active");
            $(this).toggleClass("active");
        });
    });
</script>