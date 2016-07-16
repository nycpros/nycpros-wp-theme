<!-- Article Share Button Markup -->
<div class="share-before share-round">

    <div class="googlePlus sharrre googleplus-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="+1">
    </div>

    <div class="facebook sharrre facebook-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Like">
    </div>

    <div class="twitter sharrre twitter-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweet">
    </div>

    <div class="pinterest sharrre pinterest-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Pin">
    </div>

    <div class="linkedin sharrre linkedin-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Share">
    </div>

    <div class="email sharrre last">
        <div class="box">
            <a href="/email-link/?link=<?php echo urlencode(get_the_permalink()); ?>&amp;linkid=<?php echo urlencode(get_the_ID()); ?>">
                <span class="email-text">Email</span><span class="share"></span>
            </a>
        </div>
    </div>

</div><!-- End Article Share Button Markup -->
<?php // The settings of the sharrre implementation

    // now check for featured image for pinterest
    if (get_field('featured_image') != '') {
		$primary_image = get_field('featured_image');
		$image = $primary_image['sizes']['large'];
    }

?>
<script>
jQuery(document).ready(function($) {
    $('.googleplus-<?php the_ID(); ?>').each(function() {
        var self = this;
        $(this).sharrre({
            share: {
                googlePlus: true
            },
            urlCurl: '<?php echo get_template_directory_uri(); ?>/partials/sharrre.php',
            enableHover: false,
            template: '<div class="box"><a href="#"><span class="count">{total}</span><span class="share"><span>+1</span></span></a></div>',
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('googlePlus');
            }
        });
    });
    $('.facebook-<?php the_ID(); ?>').each(function() {
        var self = this;
        $(this).sharrre({
            share: {
                facebook: true
            },
            enableHover: false,
            template: '<div class="box"><a href="#"><span class="count">{total}</span><span class="share"><span>Like</span></span></a></div>',
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('facebook');
            }
        });
    });
    $('.twitter-<?php the_ID(); ?>').each(function() {
        var self = this;
        $(this).sharrre({
            share: {
                twitter: true
            },
            enableHover: false,
            template: '<div class="box"><a href="#"><span class="count">{total}</span><span class="share"><span>Tweet</span></span></a></div>',
            enableTracking: true,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('twitter');
            }
        });
    });
    $('.pinterest-<?php the_ID(); ?>').each(function() {
        var self = this;
        $(this).sharrre({
            share: {
                pinterest: true
            },
            buttons: {
                pinterest: {
                    media: '<?php echo $image; ?>',
                    description: '<?php the_title(); ?>',
                }
            },
            enableHover: false,
            template: '<div class="box"><a href="#"><span class="count">{total}</span><span class="share"><span>Pin</span></span></a></div>',
            enableTracking: true,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('pinterest');
            }
        });
    });
    $('.linkedin-<?php the_ID(); ?>').each(function() {
        var self = this;
        $(this).sharrre({
            share: {
                linkedin: true
            },
            enableHover: false,
            template: '<div class="box"><a href="#"><span class="count">{total}</span><span class="share"><span>Share</span></span></a></div>',
            enableTracking: true,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('linkedin');
            }
        });
    });
});
</script>