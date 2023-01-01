<?php
/*------------------------------------------------------------------
[Table of contents]

1. Recent Tweets
2. Google map
3. Contact Form
5. Testimonials
6. Services style 1
8. Subscribe form
9. Posts calendar
10. Jumbotron
11. Alert
12. Progress bars
13. Panels
14. Responsive YouTube Video
15. Featured post
16. Service style2
17. Skill counter
18. Pricing table
19. Heading with border
21. Testimonials Slider V2
22. Social icons
23. List group
24. Thumbnails custom content
25. Heading with bottom border
26. Call to Action
27. Section Title&Subtitle
28. Blog Posts
29. Masonry banners
30. Sale banner
31. Products by Category

-------------------------------------------------------------------*/
add_action('init','ibid_vc_shortcodes');
function ibid_vc_shortcodes(){
    #FontAwesome icons list
    $fa_list = array(
        'fab fa-500px' => 'fab fa-500px',
        'fab fa-accessible-icon' => 'fab fa-accessible-icon',
        'fab fa-accusoft' => 'fab fa-accusoft',
        'fab fa-acquisitions-incorporated' => 'fab fa-acquisitions-incorporated',
        'fas fa-ad' => 'fas fa-ad',
        'fas fa-address-book' => 'fas fa-address-book',
        'fas fa-address-card' => 'fas fa-address-card',
        'fas fa-adjust' => 'fas fa-adjust',
        'fab fa-adn' => 'fab fa-adn',
        'fab fa-adobe' => 'fab fa-adobe',
        'fab fa-adversal' => 'fab fa-adversal',
        'fab fa-affiliatetheme' => 'fab fa-affiliatetheme',
        'fas fa-air-freshener' => 'fas fa-air-freshener',
        'fab fa-airbnb' => 'fab fa-airbnb',
        'fab fa-algolia' => 'fab fa-algolia',
        'fas fa-align-center' => 'fas fa-align-center',
        'fas fa-align-justify' => 'fas fa-align-justify',
        'fas fa-align-left' => 'fas fa-align-left',
        'fas fa-align-right' => 'fas fa-align-right',
        'fab fa-alipay' => 'fab fa-alipay',
        'fas fa-allergies' => 'fas fa-allergies',
        'fab fa-amazon' => 'fab fa-amazon',
        'fab fa-amazon-pay' => 'fab fa-amazon-pay',
        'fas fa-ambulance' => 'fas fa-ambulance',
        'fas fa-american-sign-language-interpreti' => 'fas fa-american-sign-language-interpreting',
        'fab fa-amilia' => 'fab fa-amilia',
        'fas fa-anchor' => 'fas fa-anchor',
        'fab fa-android' => 'fab fa-android',
        'fab fa-angellist' => 'fab fa-angellist',
        'fas fa-angle-double-down' => 'fas fa-angle-double-down',
        'fas fa-angle-double-left' => 'fas fa-angle-double-left',
        'fas fa-angle-double-right' => 'fas fa-angle-double-right',
        'fas fa-angle-double-up' => 'fas fa-angle-double-up',
        'fas fa-angle-down' => 'fas fa-angle-down',
        'fas fa-angle-left' => 'fas fa-angle-left',
        'fas fa-angle-right' => 'fas fa-angle-right',
        'fas fa-angle-up' => 'fas fa-angle-up',
        'fas fa-angry' => 'fas fa-angry',
        'fab fa-angrycreative' => 'fab fa-angrycreative',
        'fab fa-angular' => 'fab fa-angular',
        'fas fa-ankh' => 'fas fa-ankh',
        'fab fa-app-store' => 'fab fa-app-store',
        'fab fa-app-store-ios' => 'fab fa-app-store-ios',
        'fab fa-apper' => 'fab fa-apper',
        'fab fa-apple' => 'fab fa-apple',
        'fas fa-apple-alt' => 'fas fa-apple-alt',
        'fab fa-apple-pay' => 'fab fa-apple-pay',
        'fas fa-archive' => 'fas fa-archive',
        'fas fa-archway' => 'fas fa-archway',
        'fas fa-arrow-alt-circle-down' => 'fas fa-arrow-alt-circle-down',
        'fas fa-arrow-alt-circle-left' => 'fas fa-arrow-alt-circle-left',
        'fas fa-arrow-alt-circle-right' => 'fas fa-arrow-alt-circle-right',
        'fas fa-arrow-alt-circle-up' => 'fas fa-arrow-alt-circle-up',
        'fas fa-arrow-circle-down' => 'fas fa-arrow-circle-down',
        'fas fa-arrow-circle-left' => 'fas fa-arrow-circle-left',
        'fas fa-arrow-circle-right' => 'fas fa-arrow-circle-right',
        'fas fa-arrow-circle-up' => 'fas fa-arrow-circle-up',
        'fas fa-arrow-down' => 'fas fa-arrow-down',
        'fas fa-arrow-left' => 'fas fa-arrow-left',
        'fas fa-arrow-right' => 'fas fa-arrow-right',
        'fas fa-arrow-up' => 'fas fa-arrow-up',
        'fas fa-arrows-alt' => 'fas fa-arrows-alt',
        'fas fa-arrows-alt-h' => 'fas fa-arrows-alt-h',
        'fas fa-arrows-alt-v' => 'fas fa-arrows-alt-v',
        'fab fa-artstation' => 'fab fa-artstation',
        'fas fa-assistive-listening-systems' => 'fas fa-assistive-listening-systems',
        'fas fa-asterisk' => 'fas fa-asterisk',
        'fab fa-asymmetrik' => 'fab fa-asymmetrik',
        'fas fa-at' => 'fas fa-at',
        'fas fa-atlas' => 'fas fa-atlas',
        'fab fa-atlassian' => 'fab fa-atlassian',
        'fas fa-atom' => 'fas fa-atom',
        'fab fa-audible' => 'fab fa-audible',
        'fas fa-audio-description' => 'fas fa-audio-description',
        'fab fa-autoprefixer' => 'fab fa-autoprefixer',
        'fab fa-avianex' => 'fab fa-avianex',
        'fab fa-aviato' => 'fab fa-aviato',
        'fas fa-award' => 'fas fa-award',
        'fab fa-aws' => 'fab fa-aws',
        'fas fa-baby' => 'fas fa-baby',
        'fas fa-baby-carriage' => 'fas fa-baby-carriage',
        'fas fa-backspace' => 'fas fa-backspace',
        'fas fa-backward' => 'fas fa-backward',
        'fas fa-bacon' => 'fas fa-bacon',
        'fas fa-balance-scale' => 'fas fa-balance-scale',
        'fas fa-balance-scale-left' => 'fas fa-balance-scale-left',
        'fas fa-balance-scale-right' => 'fas fa-balance-scale-right',
        'fas fa-ban' => 'fas fa-ban',
        'fas fa-band-aid' => 'fas fa-band-aid',
        'fab fa-bandcamp' => 'fab fa-bandcamp',
        'fas fa-barcode' => 'fas fa-barcode',
        'fas fa-bars' => 'fas fa-bars',
        'fas fa-baseball-ball' => 'fas fa-baseball-ball',
        'fas fa-basketball-ball' => 'fas fa-basketball-ball',
        'fas fa-bath' => 'fas fa-bath',
        'fas fa-battery-empty' => 'fas fa-battery-empty',
        'fas fa-battery-full' => 'fas fa-battery-full',
        'fas fa-battery-half' => 'fas fa-battery-half',
        'fas fa-battery-quarter' => 'fas fa-battery-quarter',
        'fas fa-battery-three-quarters' => 'fas fa-battery-three-quarters',
        'fab fa-battle-net' => 'fab fa-battle-net',
        'fas fa-bed' => 'fas fa-bed',
        'fas fa-beer' => 'fas fa-beer',
        'fab fa-behance' => 'fab fa-behance',
        'fab fa-behance-square' => 'fab fa-behance-square',
        'fas fa-bell' => 'fas fa-bell',
        'fas fa-bell-slash' => 'fas fa-bell-slash',
        'fas fa-bezier-curve' => 'fas fa-bezier-curve',
        'fas fa-bible' => 'fas fa-bible',
        'fas fa-bicycle' => 'fas fa-bicycle',
        'fas fa-biking' => 'fas fa-biking',
        'fab fa-bimobject' => 'fab fa-bimobject',
        'fas fa-binoculars' => 'fas fa-binoculars',
        'fas fa-biohazard' => 'fas fa-biohazard',
        'fas fa-birthday-cake' => 'fas fa-birthday-cake',
        'fab fa-bitbucket' => 'fab fa-bitbucket',
        'fab fa-bitcoin' => 'fab fa-bitcoin',
        'fab fa-bity' => 'fab fa-bity',
        'fab fa-black-tie' => 'fab fa-black-tie',
        'fab fa-blackberry' => 'fab fa-blackberry',
        'fas fa-blender' => 'fas fa-blender',
        'fas fa-blender-phone' => 'fas fa-blender-phone',
        'fas fa-blind' => 'fas fa-blind',
        'fas fa-blog' => 'fas fa-blog',
        'fab fa-blogger' => 'fab fa-blogger',
        'fab fa-blogger-b' => 'fab fa-blogger-b',
        'fab fa-bluetooth' => 'fab fa-bluetooth',
        'fab fa-bluetooth-b' => 'fab fa-bluetooth-b',
        'fas fa-bold' => 'fas fa-bold',
        'fas fa-bolt' => 'fas fa-bolt',
        'fas fa-bomb' => 'fas fa-bomb',
        'fas fa-bone' => 'fas fa-bone',
        'fas fa-bong' => 'fas fa-bong',
        'fas fa-book' => 'fas fa-book',
        'fas fa-book-dead' => 'fas fa-book-dead',
        'fas fa-book-medical' => 'fas fa-book-medical',
        'fas fa-book-open' => 'fas fa-book-open',
        'fas fa-book-reader' => 'fas fa-book-reader',
        'fas fa-bookmark' => 'fas fa-bookmark',
        'fab fa-bootstrap' => 'fab fa-bootstrap',
        'fas fa-border-all' => 'fas fa-border-all',
        'fas fa-border-none' => 'fas fa-border-none',
        'fas fa-border-style' => 'fas fa-border-style',
        'fas fa-bowling-ball' => 'fas fa-bowling-ball',
        'fas fa-box' => 'fas fa-box',
        'fas fa-box-open' => 'fas fa-box-open',
        'fas fa-boxes' => 'fas fa-boxes',
        'fas fa-braille' => 'fas fa-braille',
        'fas fa-brain' => 'fas fa-brain',
        'fas fa-bread-slice' => 'fas fa-bread-slice',
        'fas fa-briefcase' => 'fas fa-briefcase',
        'fas fa-briefcase-medical' => 'fas fa-briefcase-medical',
        'fas fa-broadcast-tower' => 'fas fa-broadcast-tower',
        'fas fa-broom' => 'fas fa-broom',
        'fas fa-brush' => 'fas fa-brush',
        'fab fa-btc' => 'fab fa-btc',
        'fab fa-buffer' => 'fab fa-buffer',
        'fas fa-bug' => 'fas fa-bug',
        'fas fa-building' => 'fas fa-building',
        'fas fa-bullhorn' => 'fas fa-bullhorn',
        'fas fa-bullseye' => 'fas fa-bullseye',
        'fas fa-burn' => 'fas fa-burn',
        'fab fa-buromobelexperte' => 'fab fa-buromobelexperte',
        'fas fa-bus' => 'fas fa-bus',
        'fas fa-bus-alt' => 'fas fa-bus-alt',
        'fas fa-business-time' => 'fas fa-business-time',
        'fab fa-buysellads' => 'fab fa-buysellads',
        'fas fa-calculator' => 'fas fa-calculator',
        'fas fa-calendar' => 'fas fa-calendar',
        'fas fa-calendar-alt' => 'fas fa-calendar-alt',
        'fas fa-calendar-check' => 'fas fa-calendar-check',
        'fas fa-calendar-day' => 'fas fa-calendar-day',
        'fas fa-calendar-minus' => 'fas fa-calendar-minus',
        'fas fa-calendar-plus' => 'fas fa-calendar-plus',
        'fas fa-calendar-times' => 'fas fa-calendar-times',
        'fas fa-calendar-week' => 'fas fa-calendar-week',
        'fas fa-camera' => 'fas fa-camera',
        'fas fa-camera-retro' => 'fas fa-camera-retro',
        'fas fa-campground' => 'fas fa-campground',
        'fab fa-canadian-maple-leaf' => 'fab fa-canadian-maple-leaf',
        'fas fa-candy-cane' => 'fas fa-candy-cane',
        'fas fa-cannabis' => 'fas fa-cannabis',
        'fas fa-capsules' => 'fas fa-capsules',
        'fas fa-car' => 'fas fa-car',
        'fas fa-car-alt' => 'fas fa-car-alt',
        'fas fa-car-battery' => 'fas fa-car-battery',
        'fas fa-car-crash' => 'fas fa-car-crash',
        'fas fa-car-side' => 'fas fa-car-side',
        'fas fa-caret-down' => 'fas fa-caret-down',
        'fas fa-caret-left' => 'fas fa-caret-left',
        'fas fa-caret-right' => 'fas fa-caret-right',
        'fas fa-caret-square-down' => 'fas fa-caret-square-down',
        'fas fa-caret-square-left' => 'fas fa-caret-square-left',
        'fas fa-caret-square-right' => 'fas fa-caret-square-right',
        'fas fa-caret-square-up' => 'fas fa-caret-square-up',
        'fas fa-caret-up' => 'fas fa-caret-up',
        'fas fa-carrot' => 'fas fa-carrot',
        'fas fa-cart-arrow-down' => 'fas fa-cart-arrow-down',
        'fas fa-cart-plus' => 'fas fa-cart-plus',
        'fas fa-cash-register' => 'fas fa-cash-register',
        'fas fa-cat' => 'fas fa-cat',
        'fab fa-cc-amazon-pay' => 'fab fa-cc-amazon-pay',
        'fab fa-cc-amex' => 'fab fa-cc-amex',
        'fab fa-cc-apple-pay' => 'fab fa-cc-apple-pay',
        'fab fa-cc-diners-club' => 'fab fa-cc-diners-club',
        'fab fa-cc-discover' => 'fab fa-cc-discover',
        'fab fa-cc-jcb' => 'fab fa-cc-jcb',
        'fab fa-cc-mastercard' => 'fab fa-cc-mastercard',
        'fab fa-cc-paypal' => 'fab fa-cc-paypal',
        'fab fa-cc-stripe' => 'fab fa-cc-stripe',
        'fab fa-cc-visa' => 'fab fa-cc-visa',
        'fab fa-centercode' => 'fab fa-centercode',
        'fab fa-centos' => 'fab fa-centos',
        'fas fa-certificate' => 'fas fa-certificate',
        'fas fa-chair' => 'fas fa-chair',
        'fas fa-chalkboard' => 'fas fa-chalkboard',
        'fas fa-chalkboard-teacher' => 'fas fa-chalkboard-teacher',
        'fas fa-charging-station' => 'fas fa-charging-station',
        'fas fa-chart-area' => 'fas fa-chart-area',
        'fas fa-chart-bar' => 'fas fa-chart-bar',
        'fas fa-chart-line' => 'fas fa-chart-line',
        'fas fa-chart-pie' => 'fas fa-chart-pie',
        'fas fa-check' => 'fas fa-check',
        'fas fa-check-circle' => 'fas fa-check-circle',
        'fas fa-check-double' => 'fas fa-check-double',
        'fas fa-check-square' => 'fas fa-check-square',
        'fas fa-cheese' => 'fas fa-cheese',
        'fas fa-chess' => 'fas fa-chess',
        'fas fa-chess-bishop' => 'fas fa-chess-bishop',
        'fas fa-chess-board' => 'fas fa-chess-board',
        'fas fa-chess-king' => 'fas fa-chess-king',
        'fas fa-chess-knight' => 'fas fa-chess-knight',
        'fas fa-chess-pawn' => 'fas fa-chess-pawn',
        'fas fa-chess-queen' => 'fas fa-chess-queen',
        'fas fa-chess-rook' => 'fas fa-chess-rook',
        'fas fa-chevron-circle-down' => 'fas fa-chevron-circle-down',
        'fas fa-chevron-circle-left' => 'fas fa-chevron-circle-left',
        'fas fa-chevron-circle-right' => 'fas fa-chevron-circle-right',
        'fas fa-chevron-circle-up' => 'fas fa-chevron-circle-up',
        'fas fa-chevron-down' => 'fas fa-chevron-down',
        'fas fa-chevron-left' => 'fas fa-chevron-left',
        'fas fa-chevron-right' => 'fas fa-chevron-right',
        'fas fa-chevron-up' => 'fas fa-chevron-up',
        'fas fa-child' => 'fas fa-child',
        'fab fa-chrome' => 'fab fa-chrome',
        'fab fa-chromecast' => 'fab fa-chromecast',
        'fas fa-church' => 'fas fa-church',
        'fas fa-circle' => 'fas fa-circle',
        'fas fa-circle-notch' => 'fas fa-circle-notch',
        'fas fa-city' => 'fas fa-city',
        'fas fa-clinic-medical' => 'fas fa-clinic-medical',
        'fas fa-clipboard' => 'fas fa-clipboard',
        'fas fa-clipboard-check' => 'fas fa-clipboard-check',
        'fas fa-clipboard-list' => 'fas fa-clipboard-list',
        'fas fa-clock' => 'fas fa-clock',
        'fas fa-clone' => 'fas fa-clone',
        'fas fa-closed-captioning' => 'fas fa-closed-captioning',
        'fas fa-cloud' => 'fas fa-cloud',
        'fas fa-cloud-download-alt' => 'fas fa-cloud-download-alt',
        'fas fa-cloud-meatball' => 'fas fa-cloud-meatball',
        'fas fa-cloud-moon' => 'fas fa-cloud-moon',
        'fas fa-cloud-moon-rain' => 'fas fa-cloud-moon-rain',
        'fas fa-cloud-rain' => 'fas fa-cloud-rain',
        'fas fa-cloud-showers-heavy' => 'fas fa-cloud-showers-heavy',
        'fas fa-cloud-sun' => 'fas fa-cloud-sun',
        'fas fa-cloud-sun-rain' => 'fas fa-cloud-sun-rain',
        'fas fa-cloud-upload-alt' => 'fas fa-cloud-upload-alt',
        'fab fa-cloudscale' => 'fab fa-cloudscale',
        'fab fa-cloudsmith' => 'fab fa-cloudsmith',
        'fab fa-cloudversify' => 'fab fa-cloudversify',
        'fas fa-cocktail' => 'fas fa-cocktail',
        'fas fa-code' => 'fas fa-code',
        'fas fa-code-branch' => 'fas fa-code-branch',
        'fab fa-codepen' => 'fab fa-codepen',
        'fab fa-codiepie' => 'fab fa-codiepie',
        'fas fa-coffee' => 'fas fa-coffee',
        'fas fa-cog' => 'fas fa-cog',
        'fas fa-cogs' => 'fas fa-cogs',
        'fas fa-coins' => 'fas fa-coins',
        'fas fa-columns' => 'fas fa-columns',
        'fas fa-comment' => 'fas fa-comment',
        'fas fa-comment-alt' => 'fas fa-comment-alt',
        'fas fa-comment-dollar' => 'fas fa-comment-dollar',
        'fas fa-comment-dots' => 'fas fa-comment-dots',
        'fas fa-comment-medical' => 'fas fa-comment-medical',
        'fas fa-comment-slash' => 'fas fa-comment-slash',
        'fas fa-comments' => 'fas fa-comments',
        'fas fa-comments-dollar' => 'fas fa-comments-dollar',
        'fas fa-compact-disc' => 'fas fa-compact-disc',
        'fas fa-compass' => 'fas fa-compass',
        'fas fa-compress' => 'fas fa-compress',
        'fas fa-compress-arrows-alt' => 'fas fa-compress-arrows-alt',
        'fas fa-concierge-bell' => 'fas fa-concierge-bell',
        'fab fa-confluence' => 'fab fa-confluence',
        'fab fa-connectdevelop' => 'fab fa-connectdevelop',
        'fab fa-contao' => 'fab fa-contao',
        'fas fa-cookie' => 'fas fa-cookie',
        'fas fa-cookie-bite' => 'fas fa-cookie-bite',
        'fas fa-copy' => 'fas fa-copy',
        'fas fa-copyright' => 'fas fa-copyright',
        'fab fa-cotton-bureau' => 'fab fa-cotton-bureau',
        'fas fa-couch' => 'fas fa-couch',
        'fab fa-cpanel' => 'fab fa-cpanel',
        'fab fa-creative-commons' => 'fab fa-creative-commons',
        'fab fa-creative-commons-by' => 'fab fa-creative-commons-by',
        'fab fa-creative-commons-nc' => 'fab fa-creative-commons-nc',
        'fab fa-creative-commons-nc-eu' => 'fab fa-creative-commons-nc-eu',
        'fab fa-creative-commons-nc-jp' => 'fab fa-creative-commons-nc-jp',
        'fab fa-creative-commons-nd' => 'fab fa-creative-commons-nd',
        'fab fa-creative-commons-pd' => 'fab fa-creative-commons-pd',
        'fab fa-creative-commons-pd-alt' => 'fab fa-creative-commons-pd-alt',
        'fab fa-creative-commons-remix' => 'fab fa-creative-commons-remix',
        'fab fa-creative-commons-sa' => 'fab fa-creative-commons-sa',
        'fab fa-creative-commons-sampling' => 'fab fa-creative-commons-sampling',
        'fab fa-creative-commons-sampling-plus' => 'fab fa-creative-commons-sampling-plus',
        'fab fa-creative-commons-share' => 'fab fa-creative-commons-share',
        'fab fa-creative-commons-zero' => 'fab fa-creative-commons-zero',
        'fas fa-credit-card' => 'fas fa-credit-card',
        'fab fa-critical-role' => 'fab fa-critical-role',
        'fas fa-crop' => 'fas fa-crop',
        'fas fa-crop-alt' => 'fas fa-crop-alt',
        'fas fa-cross' => 'fas fa-cross',
        'fas fa-crosshairs' => 'fas fa-crosshairs',
        'fas fa-crow' => 'fas fa-crow',
        'fas fa-crown' => 'fas fa-crown',
        'fas fa-crutch' => 'fas fa-crutch',
        'fab fa-css3' => 'fab fa-css3',
        'fab fa-css3-alt' => 'fab fa-css3-alt',
        'fas fa-cube' => 'fas fa-cube',
        'fas fa-cubes' => 'fas fa-cubes',
        'fas fa-cut' => 'fas fa-cut',
        'fab fa-cuttlefish' => 'fab fa-cuttlefish',
        'fab fa-d-and-d' => 'fab fa-d-and-d',
        'fab fa-d-and-d-beyond' => 'fab fa-d-and-d-beyond',
        'fab fa-dashcube' => 'fab fa-dashcube',
        'fas fa-database' => 'fas fa-database',
        'fas fa-deaf' => 'fas fa-deaf',
        'fab fa-delicious' => 'fab fa-delicious',
        'fas fa-democrat' => 'fas fa-democrat',
        'fab fa-deploydog' => 'fab fa-deploydog',
        'fab fa-deskpro' => 'fab fa-deskpro',
        'fas fa-desktop' => 'fas fa-desktop',
        'fab fa-dev' => 'fab fa-dev',
        'fab fa-deviantart' => 'fab fa-deviantart',
        'fas fa-dharmachakra' => 'fas fa-dharmachakra',
        'fab fa-dhl' => 'fab fa-dhl',
        'fas fa-diagnoses' => 'fas fa-diagnoses',
        'fab fa-diaspora' => 'fab fa-diaspora',
        'fas fa-dice' => 'fas fa-dice',
        'fas fa-dice-d20' => 'fas fa-dice-d20',
        'fas fa-dice-d6' => 'fas fa-dice-d6',
        'fas fa-dice-five' => 'fas fa-dice-five',
        'fas fa-dice-four' => 'fas fa-dice-four',
        'fas fa-dice-one' => 'fas fa-dice-one',
        'fas fa-dice-six' => 'fas fa-dice-six',
        'fas fa-dice-three' => 'fas fa-dice-three',
        'fas fa-dice-two' => 'fas fa-dice-two',
        'fab fa-digg' => 'fab fa-digg',
        'fab fa-digital-ocean' => 'fab fa-digital-ocean',
        'fas fa-digital-tachograph' => 'fas fa-digital-tachograph',
        'fas fa-directions' => 'fas fa-directions',
        'fab fa-discord' => 'fab fa-discord',
        'fab fa-discourse' => 'fab fa-discourse',
        'fas fa-divide' => 'fas fa-divide',
        'fas fa-dizzy' => 'fas fa-dizzy',
        'fas fa-dna' => 'fas fa-dna',
        'fab fa-dochub' => 'fab fa-dochub',
        'fab fa-docker' => 'fab fa-docker',
        'fas fa-dog' => 'fas fa-dog',
        'fas fa-dollar-sign' => 'fas fa-dollar-sign',
        'fas fa-dolly' => 'fas fa-dolly',
        'fas fa-dolly-flatbed' => 'fas fa-dolly-flatbed',
        'fas fa-donate' => 'fas fa-donate',
        'fas fa-door-closed' => 'fas fa-door-closed',
        'fas fa-door-open' => 'fas fa-door-open',
        'fas fa-dot-circle' => 'fas fa-dot-circle',
        'fas fa-dove' => 'fas fa-dove',
        'fas fa-download' => 'fas fa-download',
        'fab fa-draft2digital' => 'fab fa-draft2digital',
        'fas fa-drafting-compass' => 'fas fa-drafting-compass',
        'fas fa-dragon' => 'fas fa-dragon',
        'fas fa-draw-polygon' => 'fas fa-draw-polygon',
        'fab fa-dribbble' => 'fab fa-dribbble',
        'fab fa-dribbble-square' => 'fab fa-dribbble-square',
        'fab fa-dropbox' => 'fab fa-dropbox',
        'fas fa-drum' => 'fas fa-drum',
        'fas fa-drum-steelpan' => 'fas fa-drum-steelpan',
        'fas fa-drumstick-bite' => 'fas fa-drumstick-bite',
        'fab fa-drupal' => 'fab fa-drupal',
        'fas fa-dumbbell' => 'fas fa-dumbbell',
        'fas fa-dumpster' => 'fas fa-dumpster',
        'fas fa-dumpster-fire' => 'fas fa-dumpster-fire',
        'fas fa-dungeon' => 'fas fa-dungeon',
        'fab fa-dyalog' => 'fab fa-dyalog',
        'fab fa-earlybirds' => 'fab fa-earlybirds',
        'fab fa-ebay' => 'fab fa-ebay',
        'fab fa-edge' => 'fab fa-edge',
        'fas fa-edit' => 'fas fa-edit',
        'fas fa-egg' => 'fas fa-egg',
        'fas fa-eject' => 'fas fa-eject',
        'fab fa-elementor' => 'fab fa-elementor',
        'fas fa-ellipsis-h' => 'fas fa-ellipsis-h',
        'fas fa-ellipsis-v' => 'fas fa-ellipsis-v',
        'fab fa-ello' => 'fab fa-ello',
        'fab fa-ember' => 'fab fa-ember',
        'fab fa-empire' => 'fab fa-empire',
        'fas fa-envelope' => 'fas fa-envelope',
        'fas fa-envelope-open' => 'fas fa-envelope-open',
        'fas fa-envelope-open-text' => 'fas fa-envelope-open-text',
        'fas fa-envelope-square' => 'fas fa-envelope-square',
        'fab fa-envira' => 'fab fa-envira',
        'fas fa-equals' => 'fas fa-equals',
        'fas fa-eraser' => 'fas fa-eraser',
        'fab fa-erlang' => 'fab fa-erlang',
        'fab fa-ethereum' => 'fab fa-ethereum',
        'fas fa-ethernet' => 'fas fa-ethernet',
        'fab fa-etsy' => 'fab fa-etsy',
        'fas fa-euro-sign' => 'fas fa-euro-sign',
        'fab fa-evernote' => 'fab fa-evernote',
        'fas fa-exchange-alt' => 'fas fa-exchange-alt',
        'fas fa-exclamation' => 'fas fa-exclamation',
        'fas fa-exclamation-circle' => 'fas fa-exclamation-circle',
        'fas fa-exclamation-triangle' => 'fas fa-exclamation-triangle',
        'fas fa-expand' => 'fas fa-expand',
        'fas fa-expand-arrows-alt' => 'fas fa-expand-arrows-alt',
        'fab fa-expeditedssl' => 'fab fa-expeditedssl',
        'fas fa-external-link-alt' => 'fas fa-external-link-alt',
        'fas fa-external-link-square-alt' => 'fas fa-external-link-square-alt',
        'fas fa-eye' => 'fas fa-eye',
        'fas fa-eye-dropper' => 'fas fa-eye-dropper',
        'fas fa-eye-slash' => 'fas fa-eye-slash',
        'fab fa-facebook' => 'fab fa-facebook',
        'fab fa-facebook-f' => 'fab fa-facebook-f',
        'fab fa-facebook-messenger' => 'fab fa-facebook-messenger',
        'fab fa-facebook-square' => 'fab fa-facebook-square',
        'fas fa-fan' => 'fas fa-fan',
        'fab fa-fantasy-flight-games' => 'fab fa-fantasy-flight-games',
        'fas fa-fast-backward' => 'fas fa-fast-backward',
        'fas fa-fast-forward' => 'fas fa-fast-forward',
        'fas fa-fax' => 'fas fa-fax',
        'fas fa-feather' => 'fas fa-feather',
        'fas fa-feather-alt' => 'fas fa-feather-alt',
        'fab fa-fedex' => 'fab fa-fedex',
        'fab fa-fedora' => 'fab fa-fedora',
        'fas fa-female' => 'fas fa-female',
        'fas fa-fighter-jet' => 'fas fa-fighter-jet',
        'fab fa-figma' => 'fab fa-figma',
        'fas fa-file' => 'fas fa-file',
        'fas fa-file-alt' => 'fas fa-file-alt',
        'fas fa-file-archive' => 'fas fa-file-archive',
        'fas fa-file-audio' => 'fas fa-file-audio',
        'fas fa-file-code' => 'fas fa-file-code',
        'fas fa-file-contract' => 'fas fa-file-contract',
        'fas fa-file-csv' => 'fas fa-file-csv',
        'fas fa-file-download' => 'fas fa-file-download',
        'fas fa-file-excel' => 'fas fa-file-excel',
        'fas fa-file-export' => 'fas fa-file-export',
        'fas fa-file-image' => 'fas fa-file-image',
        'fas fa-file-import' => 'fas fa-file-import',
        'fas fa-file-invoice' => 'fas fa-file-invoice',
        'fas fa-file-invoice-dollar' => 'fas fa-file-invoice-dollar',
        'fas fa-file-medical' => 'fas fa-file-medical',
        'fas fa-file-medical-alt' => 'fas fa-file-medical-alt',
        'fas fa-file-pdf' => 'fas fa-file-pdf',
        'fas fa-file-powerpoint' => 'fas fa-file-powerpoint',
        'fas fa-file-prescription' => 'fas fa-file-prescription',
        'fas fa-file-signature' => 'fas fa-file-signature',
        'fas fa-file-upload' => 'fas fa-file-upload',
        'fas fa-file-video' => 'fas fa-file-video',
        'fas fa-file-word' => 'fas fa-file-word',
        'fas fa-fill' => 'fas fa-fill',
        'fas fa-fill-drip' => 'fas fa-fill-drip',
        'fas fa-film' => 'fas fa-film',
        'fas fa-filter' => 'fas fa-filter',
        'fas fa-fingerprint' => 'fas fa-fingerprint',
        'fas fa-fire' => 'fas fa-fire',
        'fas fa-fire-alt' => 'fas fa-fire-alt',
        'fas fa-fire-extinguisher' => 'fas fa-fire-extinguisher',
        'fab fa-firefox' => 'fab fa-firefox',
        'fas fa-first-aid' => 'fas fa-first-aid',
        'fab fa-first-order' => 'fab fa-first-order',
        'fab fa-first-order-alt' => 'fab fa-first-order-alt',
        'fab fa-firstdraft' => 'fab fa-firstdraft',
        'fas fa-fish' => 'fas fa-fish',
        'fas fa-fist-raised' => 'fas fa-fist-raised',
        'fas fa-flag' => 'fas fa-flag',
        'fas fa-flag-checkered' => 'fas fa-flag-checkered',
        'fas fa-flag-usa' => 'fas fa-flag-usa',
        'fas fa-flask' => 'fas fa-flask',
        'fab fa-flickr' => 'fab fa-flickr',
        'fab fa-flipboard' => 'fab fa-flipboard',
        'fas fa-flushed' => 'fas fa-flushed',
        'fab fa-fly' => 'fab fa-fly',
        'fas fa-folder' => 'fas fa-folder',
        'fas fa-folder-minus' => 'fas fa-folder-minus',
        'fas fa-folder-open' => 'fas fa-folder-open',
        'fas fa-folder-plus' => 'fas fa-folder-plus',
        'fas fa-font' => 'fas fa-font',
        'fab fa-font-awesome' => 'fab fa-font-awesome',
        'fab fa-font-awesome-alt' => 'fab fa-font-awesome-alt',
        'fab fa-font-awesome-flag' => 'fab fa-font-awesome-flag',
        'far fa-font-awesome-logo-full' => 'far fa-font-awesome-logo-full',
        'fab fa-fonticons' => 'fab fa-fonticons',
        'fab fa-fonticons-fi' => 'fab fa-fonticons-fi',
        'fas fa-football-ball' => 'fas fa-football-ball',
        'fab fa-fort-awesome' => 'fab fa-fort-awesome',
        'fab fa-fort-awesome-alt' => 'fab fa-fort-awesome-alt',
        'fab fa-forumbee' => 'fab fa-forumbee',
        'fas fa-forward' => 'fas fa-forward',
        'fab fa-foursquare' => 'fab fa-foursquare',
        'fab fa-free-code-camp' => 'fab fa-free-code-camp',
        'fab fa-freebsd' => 'fab fa-freebsd',
        'fas fa-frog' => 'fas fa-frog',
        'fas fa-frown' => 'fas fa-frown',
        'fas fa-frown-open' => 'fas fa-frown-open',
        'fab fa-fulcrum' => 'fab fa-fulcrum',
        'fas fa-funnel-dollar' => 'fas fa-funnel-dollar',
        'fas fa-futbol' => 'fas fa-futbol',
        'fab fa-galactic-republic' => 'fab fa-galactic-republic',
        'fab fa-galactic-senate' => 'fab fa-galactic-senate',
        'fas fa-gamepad' => 'fas fa-gamepad',
        'fas fa-gas-pump' => 'fas fa-gas-pump',
        'fas fa-gavel' => 'fas fa-gavel',
        'fas fa-gem' => 'fas fa-gem',
        'fas fa-genderless' => 'fas fa-genderless',
        'fab fa-get-pocket' => 'fab fa-get-pocket',
        'fab fa-gg' => 'fab fa-gg',
        'fab fa-gg-circle' => 'fab fa-gg-circle',
        'fas fa-ghost' => 'fas fa-ghost',
        'fas fa-gift' => 'fas fa-gift',
        'fas fa-gifts' => 'fas fa-gifts',
        'fab fa-git' => 'fab fa-git',
        'fab fa-git-alt' => 'fab fa-git-alt',
        'fab fa-git-square' => 'fab fa-git-square',
        'fab fa-github' => 'fab fa-github',
        'fab fa-github-alt' => 'fab fa-github-alt',
        'fab fa-github-square' => 'fab fa-github-square',
        'fab fa-gitkraken' => 'fab fa-gitkraken',
        'fab fa-gitlab' => 'fab fa-gitlab',
        'fab fa-gitter' => 'fab fa-gitter',
        'fas fa-glass-cheers' => 'fas fa-glass-cheers',
        'fas fa-glass-martini' => 'fas fa-glass-martini',
        'fas fa-glass-martini-alt' => 'fas fa-glass-martini-alt',
        'fas fa-glass-whiskey' => 'fas fa-glass-whiskey',
        'fas fa-glasses' => 'fas fa-glasses',
        'fab fa-glide' => 'fab fa-glide',
        'fab fa-glide-g' => 'fab fa-glide-g',
        'fas fa-globe' => 'fas fa-globe',
        'fas fa-globe-africa' => 'fas fa-globe-africa',
        'fas fa-globe-americas' => 'fas fa-globe-americas',
        'fas fa-globe-asia' => 'fas fa-globe-asia',
        'fas fa-globe-europe' => 'fas fa-globe-europe',
        'fab fa-gofore' => 'fab fa-gofore',
        'fas fa-golf-ball' => 'fas fa-golf-ball',
        'fab fa-goodreads' => 'fab fa-goodreads',
        'fab fa-goodreads-g' => 'fab fa-goodreads-g',
        'fab fa-google' => 'fab fa-google',
        'fab fa-google-drive' => 'fab fa-google-drive',
        'fab fa-google-play' => 'fab fa-google-play',
        'fab fa-google-plus' => 'fab fa-google-plus',
        'fab fa-google-plus-g' => 'fab fa-google-plus-g',
        'fab fa-google-plus-square' => 'fab fa-google-plus-square',
        'fab fa-google-wallet' => 'fab fa-google-wallet',
        'fas fa-gopuram' => 'fas fa-gopuram',
        'fas fa-graduation-cap' => 'fas fa-graduation-cap',
        'fab fa-gratipay' => 'fab fa-gratipay',
        'fab fa-grav' => 'fab fa-grav',
        'fas fa-greater-than' => 'fas fa-greater-than',
        'fas fa-greater-than-equal' => 'fas fa-greater-than-equal',
        'fas fa-grimace' => 'fas fa-grimace',
        'fas fa-grin' => 'fas fa-grin',
        'fas fa-grin-alt' => 'fas fa-grin-alt',
        'fas fa-grin-beam' => 'fas fa-grin-beam',
        'fas fa-grin-beam-sweat' => 'fas fa-grin-beam-sweat',
        'fas fa-grin-hearts' => 'fas fa-grin-hearts',
        'fas fa-grin-squint' => 'fas fa-grin-squint',
        'fas fa-grin-squint-tears' => 'fas fa-grin-squint-tears',
        'fas fa-grin-stars' => 'fas fa-grin-stars',
        'fas fa-grin-tears' => 'fas fa-grin-tears',
        'fas fa-grin-tongue' => 'fas fa-grin-tongue',
        'fas fa-grin-tongue-squint' => 'fas fa-grin-tongue-squint',
        'fas fa-grin-tongue-wink' => 'fas fa-grin-tongue-wink',
        'fas fa-grin-wink' => 'fas fa-grin-wink',
        'fas fa-grip-horizontal' => 'fas fa-grip-horizontal',
        'fas fa-grip-lines' => 'fas fa-grip-lines',
        'fas fa-grip-lines-vertical' => 'fas fa-grip-lines-vertical',
        'fas fa-grip-vertical' => 'fas fa-grip-vertical',
        'fab fa-gripfire' => 'fab fa-gripfire',
        'fab fa-grunt' => 'fab fa-grunt',
        'fas fa-guitar' => 'fas fa-guitar',
        'fab fa-gulp' => 'fab fa-gulp',
        'fas fa-h-square' => 'fas fa-h-square',
        'fab fa-hacker-news' => 'fab fa-hacker-news',
        'fab fa-hacker-news-square' => 'fab fa-hacker-news-square',
        'fab fa-hackerrank' => 'fab fa-hackerrank',
        'fas fa-hamburger' => 'fas fa-hamburger',
        'fas fa-hammer' => 'fas fa-hammer',
        'fas fa-hamsa' => 'fas fa-hamsa',
        'fas fa-hand-holding' => 'fas fa-hand-holding',
        'fas fa-hand-holding-heart' => 'fas fa-hand-holding-heart',
        'fas fa-hand-holding-usd' => 'fas fa-hand-holding-usd',
        'fas fa-hand-lizard' => 'fas fa-hand-lizard',
        'fas fa-hand-middle-finger' => 'fas fa-hand-middle-finger',
        'fas fa-hand-paper' => 'fas fa-hand-paper',
        'fas fa-hand-peace' => 'fas fa-hand-peace',
        'fas fa-hand-point-down' => 'fas fa-hand-point-down',
        'fas fa-hand-point-left' => 'fas fa-hand-point-left',
        'fas fa-hand-point-right' => 'fas fa-hand-point-right',
        'fas fa-hand-point-up' => 'fas fa-hand-point-up',
        'fas fa-hand-pointer' => 'fas fa-hand-pointer',
        'fas fa-hand-rock' => 'fas fa-hand-rock',
        'fas fa-hand-scissors' => 'fas fa-hand-scissors',
        'fas fa-hand-spock' => 'fas fa-hand-spock',
        'fas fa-hands' => 'fas fa-hands',
        'fas fa-hands-helping' => 'fas fa-hands-helping',
        'fas fa-handshake' => 'fas fa-handshake',
        'fas fa-hanukiah' => 'fas fa-hanukiah',
        'fas fa-hard-hat' => 'fas fa-hard-hat',
        'fas fa-hashtag' => 'fas fa-hashtag',
        'fas fa-hat-wizard' => 'fas fa-hat-wizard',
        'fas fa-haykal' => 'fas fa-haykal',
        'fas fa-hdd' => 'fas fa-hdd',
        'fas fa-heading' => 'fas fa-heading',
        'fas fa-headphones' => 'fas fa-headphones',
        'fas fa-headphones-alt' => 'fas fa-headphones-alt',
        'fas fa-headset' => 'fas fa-headset',
        'fas fa-heart' => 'fas fa-heart',
        'fas fa-heart-broken' => 'fas fa-heart-broken',
        'fas fa-heartbeat' => 'fas fa-heartbeat',
        'fas fa-helicopter' => 'fas fa-helicopter',
        'fas fa-highlighter' => 'fas fa-highlighter',
        'fas fa-hiking' => 'fas fa-hiking',
        'fas fa-hippo' => 'fas fa-hippo',
        'fab fa-hips' => 'fab fa-hips',
        'fab fa-hire-a-helper' => 'fab fa-hire-a-helper',
        'fas fa-history' => 'fas fa-history',
        'fas fa-hockey-puck' => 'fas fa-hockey-puck',
        'fas fa-holly-berry' => 'fas fa-holly-berry',
        'fas fa-home' => 'fas fa-home',
        'fab fa-hooli' => 'fab fa-hooli',
        'fab fa-hornbill' => 'fab fa-hornbill',
        'fas fa-horse' => 'fas fa-horse',
        'fas fa-horse-head' => 'fas fa-horse-head',
        'fas fa-hospital' => 'fas fa-hospital',
        'fas fa-hospital-alt' => 'fas fa-hospital-alt',
        'fas fa-hospital-symbol' => 'fas fa-hospital-symbol',
        'fas fa-hot-tub' => 'fas fa-hot-tub',
        'fas fa-hotdog' => 'fas fa-hotdog',
        'fas fa-hotel' => 'fas fa-hotel',
        'fab fa-hotjar' => 'fab fa-hotjar',
        'fas fa-hourglass' => 'fas fa-hourglass',
        'fas fa-hourglass-end' => 'fas fa-hourglass-end',
        'fas fa-hourglass-half' => 'fas fa-hourglass-half',
        'fas fa-hourglass-start' => 'fas fa-hourglass-start',
        'fas fa-house-damage' => 'fas fa-house-damage',
        'fab fa-houzz' => 'fab fa-houzz',
        'fas fa-hryvnia' => 'fas fa-hryvnia',
        'fab fa-html5' => 'fab fa-html5',
        'fab fa-hubspot' => 'fab fa-hubspot',
        'fas fa-i-cursor' => 'fas fa-i-cursor',
        'fas fa-ice-cream' => 'fas fa-ice-cream',
        'fas fa-icicles' => 'fas fa-icicles',
        'fas fa-icons' => 'fas fa-icons',
        'fas fa-id-badge' => 'fas fa-id-badge',
        'fas fa-id-card' => 'fas fa-id-card',
        'fas fa-id-card-alt' => 'fas fa-id-card-alt',
        'fas fa-igloo' => 'fas fa-igloo',
        'fas fa-image' => 'fas fa-image',
        'fas fa-images' => 'fas fa-images',
        'fab fa-imdb' => 'fab fa-imdb',
        'fas fa-inbox' => 'fas fa-inbox',
        'fas fa-indent' => 'fas fa-indent',
        'fas fa-industry' => 'fas fa-industry',
        'fas fa-infinity' => 'fas fa-infinity',
        'fas fa-info' => 'fas fa-info',
        'fas fa-info-circle' => 'fas fa-info-circle',
        'fab fa-instagram' => 'fab fa-instagram',
        'fab fa-intercom' => 'fab fa-intercom',
        'fab fa-internet-explorer' => 'fab fa-internet-explorer',
        'fab fa-invision' => 'fab fa-invision',
        'fab fa-ioxhost' => 'fab fa-ioxhost',
        'fas fa-italic' => 'fas fa-italic',
        'fab fa-itch-io' => 'fab fa-itch-io',
        'fab fa-itunes' => 'fab fa-itunes',
        'fab fa-itunes-note' => 'fab fa-itunes-note',
        'fab fa-java' => 'fab fa-java',
        'fas fa-jedi' => 'fas fa-jedi',
        'fab fa-jedi-order' => 'fab fa-jedi-order',
        'fab fa-jenkins' => 'fab fa-jenkins',
        'fab fa-jira' => 'fab fa-jira',
        'fab fa-joget' => 'fab fa-joget',
        'fas fa-joint' => 'fas fa-joint',
        'fab fa-joomla' => 'fab fa-joomla',
        'fas fa-journal-whills' => 'fas fa-journal-whills',
        'fab fa-js' => 'fab fa-js',
        'fab fa-js-square' => 'fab fa-js-square',
        'fab fa-jsfiddle' => 'fab fa-jsfiddle',
        'fas fa-kaaba' => 'fas fa-kaaba',
        'fab fa-kaggle' => 'fab fa-kaggle',
        'fas fa-key' => 'fas fa-key',
        'fab fa-keybase' => 'fab fa-keybase',
        'fas fa-keyboard' => 'fas fa-keyboard',
        'fab fa-keycdn' => 'fab fa-keycdn',
        'fas fa-khanda' => 'fas fa-khanda',
        'fab fa-kickstarter' => 'fab fa-kickstarter',
        'fab fa-kickstarter-k' => 'fab fa-kickstarter-k',
        'fas fa-kiss' => 'fas fa-kiss',
        'fas fa-kiss-beam' => 'fas fa-kiss-beam',
        'fas fa-kiss-wink-heart' => 'fas fa-kiss-wink-heart',
        'fas fa-kiwi-bird' => 'fas fa-kiwi-bird',
        'fab fa-korvue' => 'fab fa-korvue',
        'fas fa-landmark' => 'fas fa-landmark',
        'fas fa-language' => 'fas fa-language',
        'fas fa-laptop' => 'fas fa-laptop',
        'fas fa-laptop-code' => 'fas fa-laptop-code',
        'fas fa-laptop-medical' => 'fas fa-laptop-medical',
        'fab fa-laravel' => 'fab fa-laravel',
        'fab fa-lastfm' => 'fab fa-lastfm',
        'fab fa-lastfm-square' => 'fab fa-lastfm-square',
        'fas fa-laugh' => 'fas fa-laugh',
        'fas fa-laugh-beam' => 'fas fa-laugh-beam',
        'fas fa-laugh-squint' => 'fas fa-laugh-squint',
        'fas fa-laugh-wink' => 'fas fa-laugh-wink',
        'fas fa-layer-group' => 'fas fa-layer-group',
        'fas fa-leaf' => 'fas fa-leaf',
        'fab fa-leanpub' => 'fab fa-leanpub',
        'fas fa-lemon' => 'fas fa-lemon',
        'fab fa-less' => 'fab fa-less',
        'fas fa-less-than' => 'fas fa-less-than',
        'fas fa-less-than-equal' => 'fas fa-less-than-equal',
        'fas fa-level-down-alt' => 'fas fa-level-down-alt',
        'fas fa-level-up-alt' => 'fas fa-level-up-alt',
        'fas fa-life-ring' => 'fas fa-life-ring',
        'fas fa-lightbulb' => 'fas fa-lightbulb',
        'fab fa-line' => 'fab fa-line',
        'fas fa-link' => 'fas fa-link',
        'fab fa-linkedin' => 'fab fa-linkedin',
        'fab fa-linkedin-in' => 'fab fa-linkedin-in',
        'fab fa-linode' => 'fab fa-linode',
        'fab fa-linux' => 'fab fa-linux',
        'fas fa-lira-sign' => 'fas fa-lira-sign',
        'fas fa-list' => 'fas fa-list',
        'fas fa-list-alt' => 'fas fa-list-alt',
        'fas fa-list-ol' => 'fas fa-list-ol',
        'fas fa-list-ul' => 'fas fa-list-ul',
        'fas fa-location-arrow' => 'fas fa-location-arrow',
        'fas fa-lock' => 'fas fa-lock',
        'fas fa-lock-open' => 'fas fa-lock-open',
        'fas fa-long-arrow-alt-down' => 'fas fa-long-arrow-alt-down',
        'fas fa-long-arrow-alt-left' => 'fas fa-long-arrow-alt-left',
        'fas fa-long-arrow-alt-right' => 'fas fa-long-arrow-alt-right',
        'fas fa-long-arrow-alt-up' => 'fas fa-long-arrow-alt-up',
        'fas fa-low-vision' => 'fas fa-low-vision',
        'fas fa-luggage-cart' => 'fas fa-luggage-cart',
        'fab fa-lyft' => 'fab fa-lyft',
        'fab fa-magento' => 'fab fa-magento',
        'fas fa-magic' => 'fas fa-magic',
        'fas fa-magnet' => 'fas fa-magnet',
        'fas fa-mail-bulk' => 'fas fa-mail-bulk',
        'fab fa-mailchimp' => 'fab fa-mailchimp',
        'fas fa-male' => 'fas fa-male',
        'fab fa-mandalorian' => 'fab fa-mandalorian',
        'fas fa-map' => 'fas fa-map',
        'fas fa-map-marked' => 'fas fa-map-marked',
        'fas fa-map-marked-alt' => 'fas fa-map-marked-alt',
        'fas fa-map-marker' => 'fas fa-map-marker',
        'fas fa-map-marker-alt' => 'fas fa-map-marker-alt',
        'fas fa-map-pin' => 'fas fa-map-pin',
        'fas fa-map-signs' => 'fas fa-map-signs',
        'fab fa-markdown' => 'fab fa-markdown',
        'fas fa-marker' => 'fas fa-marker',
        'fas fa-mars' => 'fas fa-mars',
        'fas fa-mars-double' => 'fas fa-mars-double',
        'fas fa-mars-stroke' => 'fas fa-mars-stroke',
        'fas fa-mars-stroke-h' => 'fas fa-mars-stroke-h',
        'fas fa-mars-stroke-v' => 'fas fa-mars-stroke-v',
        'fas fa-mask' => 'fas fa-mask',
        'fab fa-mastodon' => 'fab fa-mastodon',
        'fab fa-maxcdn' => 'fab fa-maxcdn',
        'fas fa-medal' => 'fas fa-medal',
        'fab fa-medapps' => 'fab fa-medapps',
        'fab fa-medium' => 'fab fa-medium',
        'fab fa-medium-m' => 'fab fa-medium-m',
        'fas fa-medkit' => 'fas fa-medkit',
        'fab fa-medrt' => 'fab fa-medrt',
        'fab fa-meetup' => 'fab fa-meetup',
        'fab fa-megaport' => 'fab fa-megaport',
        'fas fa-meh' => 'fas fa-meh',
        'fas fa-meh-blank' => 'fas fa-meh-blank',
        'fas fa-meh-rolling-eyes' => 'fas fa-meh-rolling-eyes',
        'fas fa-memory' => 'fas fa-memory',
        'fab fa-mendeley' => 'fab fa-mendeley',
        'fas fa-menorah' => 'fas fa-menorah',
        'fas fa-mercury' => 'fas fa-mercury',
        'fas fa-meteor' => 'fas fa-meteor',
        'fas fa-microchip' => 'fas fa-microchip',
        'fas fa-microphone' => 'fas fa-microphone',
        'fas fa-microphone-alt' => 'fas fa-microphone-alt',
        'fas fa-microphone-alt-slash' => 'fas fa-microphone-alt-slash',
        'fas fa-microphone-slash' => 'fas fa-microphone-slash',
        'fas fa-microscope' => 'fas fa-microscope',
        'fab fa-microsoft' => 'fab fa-microsoft',
        'fas fa-minus' => 'fas fa-minus',
        'fas fa-minus-circle' => 'fas fa-minus-circle',
        'fas fa-minus-square' => 'fas fa-minus-square',
        'fas fa-mitten' => 'fas fa-mitten',
        'fab fa-mix' => 'fab fa-mix',
        'fab fa-mixcloud' => 'fab fa-mixcloud',
        'fab fa-mizuni' => 'fab fa-mizuni',
        'fas fa-mobile' => 'fas fa-mobile',
        'fas fa-mobile-alt' => 'fas fa-mobile-alt',
        'fab fa-modx' => 'fab fa-modx',
        'fab fa-monero' => 'fab fa-monero',
        'fas fa-money-bill' => 'fas fa-money-bill',
        'fas fa-money-bill-alt' => 'fas fa-money-bill-alt',
        'fas fa-money-bill-wave' => 'fas fa-money-bill-wave',
        'fas fa-money-bill-wave-alt' => 'fas fa-money-bill-wave-alt',
        'fas fa-money-check' => 'fas fa-money-check',
        'fas fa-money-check-alt' => 'fas fa-money-check-alt',
        'fas fa-monument' => 'fas fa-monument',
        'fas fa-moon' => 'fas fa-moon',
        'fas fa-mortar-pestle' => 'fas fa-mortar-pestle',
        'fas fa-mosque' => 'fas fa-mosque',
        'fas fa-motorcycle' => 'fas fa-motorcycle',
        'fas fa-mountain' => 'fas fa-mountain',
        'fas fa-mouse-pointer' => 'fas fa-mouse-pointer',
        'fas fa-mug-hot' => 'fas fa-mug-hot',
        'fas fa-music' => 'fas fa-music',
        'fab fa-napster' => 'fab fa-napster',
        'fab fa-neos' => 'fab fa-neos',
        'fas fa-network-wired' => 'fas fa-network-wired',
        'fas fa-neuter' => 'fas fa-neuter',
        'fas fa-newspaper' => 'fas fa-newspaper',
        'fab fa-nimblr' => 'fab fa-nimblr',
        'fab fa-node' => 'fab fa-node',
        'fab fa-node-js' => 'fab fa-node-js',
        'fas fa-not-equal' => 'fas fa-not-equal',
        'fas fa-notes-medical' => 'fas fa-notes-medical',
        'fab fa-npm' => 'fab fa-npm',
        'fab fa-ns8' => 'fab fa-ns8',
        'fab fa-nutritionix' => 'fab fa-nutritionix',
        'fas fa-object-group' => 'fas fa-object-group',
        'fas fa-object-ungroup' => 'fas fa-object-ungroup',
        'fab fa-odnoklassniki' => 'fab fa-odnoklassniki',
        'fab fa-odnoklassniki-square' => 'fab fa-odnoklassniki-square',
        'fas fa-oil-can' => 'fas fa-oil-can',
        'fab fa-old-republic' => 'fab fa-old-republic',
        'fas fa-om' => 'fas fa-om',
        'fab fa-opencart' => 'fab fa-opencart',
        'fab fa-openid' => 'fab fa-openid',
        'fab fa-opera' => 'fab fa-opera',
        'fab fa-optin-monster' => 'fab fa-optin-monster',
        'fab fa-osi' => 'fab fa-osi',
        'fas fa-otter' => 'fas fa-otter',
        'fas fa-outdent' => 'fas fa-outdent',
        'fab fa-page4' => 'fab fa-page4',
        'fab fa-pagelines' => 'fab fa-pagelines',
        'fas fa-pager' => 'fas fa-pager',
        'fas fa-paint-brush' => 'fas fa-paint-brush',
        'fas fa-paint-roller' => 'fas fa-paint-roller',
        'fas fa-palette' => 'fas fa-palette',
        'fab fa-palfed' => 'fab fa-palfed',
        'fas fa-pallet' => 'fas fa-pallet',
        'fas fa-paper-plane' => 'fas fa-paper-plane',
        'fas fa-paperclip' => 'fas fa-paperclip',
        'fas fa-parachute-box' => 'fas fa-parachute-box',
        'fas fa-paragraph' => 'fas fa-paragraph',
        'fas fa-parking' => 'fas fa-parking',
        'fas fa-passport' => 'fas fa-passport',
        'fas fa-pastafarianism' => 'fas fa-pastafarianism',
        'fas fa-paste' => 'fas fa-paste',
        'fab fa-patreon' => 'fab fa-patreon',
        'fas fa-pause' => 'fas fa-pause',
        'fas fa-pause-circle' => 'fas fa-pause-circle',
        'fas fa-paw' => 'fas fa-paw',
        'fab fa-paypal' => 'fab fa-paypal',
        'fas fa-peace' => 'fas fa-peace',
        'fas fa-pen' => 'fas fa-pen',
        'fas fa-pen-alt' => 'fas fa-pen-alt',
        'fas fa-pen-fancy' => 'fas fa-pen-fancy',
        'fas fa-pen-nib' => 'fas fa-pen-nib',
        'fas fa-pen-square' => 'fas fa-pen-square',
        'fas fa-pencil-alt' => 'fas fa-pencil-alt',
        'fas fa-pencil-ruler' => 'fas fa-pencil-ruler',
        'fab fa-penny-arcade' => 'fab fa-penny-arcade',
        'fas fa-people-carry' => 'fas fa-people-carry',
        'fas fa-pepper-hot' => 'fas fa-pepper-hot',
        'fas fa-percent' => 'fas fa-percent',
        'fas fa-percentage' => 'fas fa-percentage',
        'fab fa-periscope' => 'fab fa-periscope',
        'fas fa-person-booth' => 'fas fa-person-booth',
        'fab fa-phabricator' => 'fab fa-phabricator',
        'fab fa-phoenix-framework' => 'fab fa-phoenix-framework',
        'fab fa-phoenix-squadron' => 'fab fa-phoenix-squadron',
        'fas fa-phone' => 'fas fa-phone',
        'fas fa-phone-alt' => 'fas fa-phone-alt',
        'fas fa-phone-slash' => 'fas fa-phone-slash',
        'fas fa-phone-square' => 'fas fa-phone-square',
        'fas fa-phone-square-alt' => 'fas fa-phone-square-alt',
        'fas fa-phone-volume' => 'fas fa-phone-volume',
        'fas fa-photo-video' => 'fas fa-photo-video',
        'fab fa-php' => 'fab fa-php',
        'fab fa-pied-piper' => 'fab fa-pied-piper',
        'fab fa-pied-piper-alt' => 'fab fa-pied-piper-alt',
        'fab fa-pied-piper-hat' => 'fab fa-pied-piper-hat',
        'fab fa-pied-piper-pp' => 'fab fa-pied-piper-pp',
        'fas fa-piggy-bank' => 'fas fa-piggy-bank',
        'fas fa-pills' => 'fas fa-pills',
        'fab fa-pinterest' => 'fab fa-pinterest',
        'fab fa-pinterest-p' => 'fab fa-pinterest-p',
        'fab fa-pinterest-square' => 'fab fa-pinterest-square',
        'fas fa-pizza-slice' => 'fas fa-pizza-slice',
        'fas fa-place-of-worship' => 'fas fa-place-of-worship',
        'fas fa-plane' => 'fas fa-plane',
        'fas fa-plane-arrival' => 'fas fa-plane-arrival',
        'fas fa-plane-departure' => 'fas fa-plane-departure',
        'fas fa-play' => 'fas fa-play',
        'fas fa-play-circle' => 'fas fa-play-circle',
        'fab fa-playstation' => 'fab fa-playstation',
        'fas fa-plug' => 'fas fa-plug',
        'fas fa-plus' => 'fas fa-plus',
        'fas fa-plus-circle' => 'fas fa-plus-circle',
        'fas fa-plus-square' => 'fas fa-plus-square',
        'fas fa-podcast' => 'fas fa-podcast',
        'fas fa-poll' => 'fas fa-poll',
        'fas fa-poll-h' => 'fas fa-poll-h',
        'fas fa-poo' => 'fas fa-poo',
        'fas fa-poo-storm' => 'fas fa-poo-storm',
        'fas fa-poop' => 'fas fa-poop',
        'fas fa-portrait' => 'fas fa-portrait',
        'fas fa-pound-sign' => 'fas fa-pound-sign',
        'fas fa-power-off' => 'fas fa-power-off',
        'fas fa-pray' => 'fas fa-pray',
        'fas fa-praying-hands' => 'fas fa-praying-hands',
        'fas fa-prescription' => 'fas fa-prescription',
        'fas fa-prescription-bottle' => 'fas fa-prescription-bottle',
        'fas fa-prescription-bottle-alt' => 'fas fa-prescription-bottle-alt',
        'fas fa-print' => 'fas fa-print',
        'fas fa-procedures' => 'fas fa-procedures',
        'fab fa-product-hunt' => 'fab fa-product-hunt',
        'fas fa-project-diagram' => 'fas fa-project-diagram',
        'fab fa-pushed' => 'fab fa-pushed',
        'fas fa-puzzle-piece' => 'fas fa-puzzle-piece',
        'fab fa-python' => 'fab fa-python',
        'fab fa-qq' => 'fab fa-qq',
        'fas fa-qrcode' => 'fas fa-qrcode',
        'fas fa-question' => 'fas fa-question',
        'fas fa-question-circle' => 'fas fa-question-circle',
        'fas fa-quidditch' => 'fas fa-quidditch',
        'fab fa-quinscape' => 'fab fa-quinscape',
        'fab fa-quora' => 'fab fa-quora',
        'fas fa-quote-left' => 'fas fa-quote-left',
        'fas fa-quote-right' => 'fas fa-quote-right',
        'fas fa-quran' => 'fas fa-quran',
        'fab fa-r-project' => 'fab fa-r-project',
        'fas fa-radiation' => 'fas fa-radiation',
        'fas fa-radiation-alt' => 'fas fa-radiation-alt',
        'fas fa-rainbow' => 'fas fa-rainbow',
        'fas fa-random' => 'fas fa-random',
        'fab fa-raspberry-pi' => 'fab fa-raspberry-pi',
        'fab fa-ravelry' => 'fab fa-ravelry',
        'fab fa-react' => 'fab fa-react',
        'fab fa-reacteurope' => 'fab fa-reacteurope',
        'fab fa-readme' => 'fab fa-readme',
        'fab fa-rebel' => 'fab fa-rebel',
        'fas fa-receipt' => 'fas fa-receipt',
        'fas fa-recycle' => 'fas fa-recycle',
        'fab fa-red-river' => 'fab fa-red-river',
        'fab fa-reddit' => 'fab fa-reddit',
        'fab fa-reddit-alien' => 'fab fa-reddit-alien',
        'fab fa-reddit-square' => 'fab fa-reddit-square',
        'fab fa-redhat' => 'fab fa-redhat',
        'fas fa-redo' => 'fas fa-redo',
        'fas fa-redo-alt' => 'fas fa-redo-alt',
        'fas fa-registered' => 'fas fa-registered',
        'fas fa-remove-format' => 'fas fa-remove-format',
        'fab fa-renren' => 'fab fa-renren',
        'fas fa-reply' => 'fas fa-reply',
        'fas fa-reply-all' => 'fas fa-reply-all',
        'fab fa-replyd' => 'fab fa-replyd',
        'fas fa-republican' => 'fas fa-republican',
        'fab fa-researchgate' => 'fab fa-researchgate',
        'fab fa-resolving' => 'fab fa-resolving',
        'fas fa-restroom' => 'fas fa-restroom',
        'fas fa-retweet' => 'fas fa-retweet',
        'fab fa-rev' => 'fab fa-rev',
        'fas fa-ribbon' => 'fas fa-ribbon',
        'fas fa-ring' => 'fas fa-ring',
        'fas fa-road' => 'fas fa-road',
        'fas fa-robot' => 'fas fa-robot',
        'fas fa-rocket' => 'fas fa-rocket',
        'fab fa-rocketchat' => 'fab fa-rocketchat',
        'fab fa-rockrms' => 'fab fa-rockrms',
        'fas fa-route' => 'fas fa-route',
        'fas fa-rss' => 'fas fa-rss',
        'fas fa-rss-square' => 'fas fa-rss-square',
        'fas fa-ruble-sign' => 'fas fa-ruble-sign',
        'fas fa-ruler' => 'fas fa-ruler',
        'fas fa-ruler-combined' => 'fas fa-ruler-combined',
        'fas fa-ruler-horizontal' => 'fas fa-ruler-horizontal',
        'fas fa-ruler-vertical' => 'fas fa-ruler-vertical',
        'fas fa-running' => 'fas fa-running',
        'fas fa-rupee-sign' => 'fas fa-rupee-sign',
        'fas fa-sad-cry' => 'fas fa-sad-cry',
        'fas fa-sad-tear' => 'fas fa-sad-tear',
        'fab fa-safari' => 'fab fa-safari',
        'fab fa-salesforce' => 'fab fa-salesforce',
        'fab fa-sass' => 'fab fa-sass',
        'fas fa-satellite' => 'fas fa-satellite',
        'fas fa-satellite-dish' => 'fas fa-satellite-dish',
        'fas fa-save' => 'fas fa-save',
        'fab fa-schlix' => 'fab fa-schlix',
        'fas fa-school' => 'fas fa-school',
        'fas fa-screwdriver' => 'fas fa-screwdriver',
        'fab fa-scribd' => 'fab fa-scribd',
        'fas fa-scroll' => 'fas fa-scroll',
        'fas fa-sd-card' => 'fas fa-sd-card',
        'fas fa-search' => 'fas fa-search',
        'fas fa-search-dollar' => 'fas fa-search-dollar',
        'fas fa-search-location' => 'fas fa-search-location',
        'fas fa-search-minus' => 'fas fa-search-minus',
        'fas fa-search-plus' => 'fas fa-search-plus',
        'fab fa-searchengin' => 'fab fa-searchengin',
        'fas fa-seedling' => 'fas fa-seedling',
        'fab fa-sellcast' => 'fab fa-sellcast',
        'fab fa-sellsy' => 'fab fa-sellsy',
        'fas fa-server' => 'fas fa-server',
        'fab fa-servicestack' => 'fab fa-servicestack',
        'fas fa-shapes' => 'fas fa-shapes',
        'fas fa-share' => 'fas fa-share',
        'fas fa-share-alt' => 'fas fa-share-alt',
        'fas fa-share-alt-square' => 'fas fa-share-alt-square',
        'fas fa-share-square' => 'fas fa-share-square',
        'fas fa-shekel-sign' => 'fas fa-shekel-sign',
        'fas fa-shield-alt' => 'fas fa-shield-alt',
        'fas fa-ship' => 'fas fa-ship',
        'fas fa-shipping-fast' => 'fas fa-shipping-fast',
        'fab fa-shirtsinbulk' => 'fab fa-shirtsinbulk',
        'fas fa-shoe-prints' => 'fas fa-shoe-prints',
        'fas fa-shopping-bag' => 'fas fa-shopping-bag',
        'fas fa-shopping-basket' => 'fas fa-shopping-basket',
        'fas fa-shopping-cart' => 'fas fa-shopping-cart',
        'fab fa-shopware' => 'fab fa-shopware',
        'fas fa-shower' => 'fas fa-shower',
        'fas fa-shuttle-van' => 'fas fa-shuttle-van',
        'fas fa-sign' => 'fas fa-sign',
        'fas fa-sign-in-alt' => 'fas fa-sign-in-alt',
        'fas fa-sign-language' => 'fas fa-sign-language',
        'fas fa-sign-out-alt' => 'fas fa-sign-out-alt',
        'fas fa-signal' => 'fas fa-signal',
        'fas fa-signature' => 'fas fa-signature',
        'fas fa-sim-card' => 'fas fa-sim-card',
        'fab fa-simplybuilt' => 'fab fa-simplybuilt',
        'fab fa-sistrix' => 'fab fa-sistrix',
        'fas fa-sitemap' => 'fas fa-sitemap',
        'fab fa-sith' => 'fab fa-sith',
        'fas fa-skating' => 'fas fa-skating',
        'fab fa-sketch' => 'fab fa-sketch',
        'fas fa-skiing' => 'fas fa-skiing',
        'fas fa-skiing-nordic' => 'fas fa-skiing-nordic',
        'fas fa-skull' => 'fas fa-skull',
        'fas fa-skull-crossbones' => 'fas fa-skull-crossbones',
        'fab fa-skyatlas' => 'fab fa-skyatlas',
        'fab fa-skype' => 'fab fa-skype',
        'fab fa-slack' => 'fab fa-slack',
        'fab fa-slack-hash' => 'fab fa-slack-hash',
        'fas fa-slash' => 'fas fa-slash',
        'fas fa-sleigh' => 'fas fa-sleigh',
        'fas fa-sliders-h' => 'fas fa-sliders-h',
        'fab fa-slideshare' => 'fab fa-slideshare',
        'fas fa-smile' => 'fas fa-smile',
        'fas fa-smile-beam' => 'fas fa-smile-beam',
        'fas fa-smile-wink' => 'fas fa-smile-wink',
        'fas fa-smog' => 'fas fa-smog',
        'fas fa-smoking' => 'fas fa-smoking',
        'fas fa-smoking-ban' => 'fas fa-smoking-ban',
        'fas fa-sms' => 'fas fa-sms',
        'fab fa-snapchat' => 'fab fa-snapchat',
        'fab fa-snapchat-ghost' => 'fab fa-snapchat-ghost',
        'fab fa-snapchat-square' => 'fab fa-snapchat-square',
        'fas fa-snowboarding' => 'fas fa-snowboarding',
        'fas fa-snowflake' => 'fas fa-snowflake',
        'fas fa-snowman' => 'fas fa-snowman',
        'fas fa-snowplow' => 'fas fa-snowplow',
        'fas fa-socks' => 'fas fa-socks',
        'fas fa-solar-panel' => 'fas fa-solar-panel',
        'fas fa-sort' => 'fas fa-sort',
        'fas fa-sort-alpha-down' => 'fas fa-sort-alpha-down',
        'fas fa-sort-alpha-down-alt' => 'fas fa-sort-alpha-down-alt',
        'fas fa-sort-alpha-up' => 'fas fa-sort-alpha-up',
        'fas fa-sort-alpha-up-alt' => 'fas fa-sort-alpha-up-alt',
        'fas fa-sort-amount-down' => 'fas fa-sort-amount-down',
        'fas fa-sort-amount-down-alt' => 'fas fa-sort-amount-down-alt',
        'fas fa-sort-amount-up' => 'fas fa-sort-amount-up',
        'fas fa-sort-amount-up-alt' => 'fas fa-sort-amount-up-alt',
        'fas fa-sort-down' => 'fas fa-sort-down',
        'fas fa-sort-numeric-down' => 'fas fa-sort-numeric-down',
        'fas fa-sort-numeric-down-alt' => 'fas fa-sort-numeric-down-alt',
        'fas fa-sort-numeric-up' => 'fas fa-sort-numeric-up',
        'fas fa-sort-numeric-up-alt' => 'fas fa-sort-numeric-up-alt',
        'fas fa-sort-up' => 'fas fa-sort-up',
        'fab fa-soundcloud' => 'fab fa-soundcloud',
        'fab fa-sourcetree' => 'fab fa-sourcetree',
        'fas fa-spa' => 'fas fa-spa',
        'fas fa-space-shuttle' => 'fas fa-space-shuttle',
        'fab fa-speakap' => 'fab fa-speakap',
        'fab fa-speaker-deck' => 'fab fa-speaker-deck',
        'fas fa-spell-check' => 'fas fa-spell-check',
        'fas fa-spider' => 'fas fa-spider',
        'fas fa-spinner' => 'fas fa-spinner',
        'fas fa-splotch' => 'fas fa-splotch',
        'fab fa-spotify' => 'fab fa-spotify',
        'fas fa-spray-can' => 'fas fa-spray-can',
        'fas fa-square' => 'fas fa-square',
        'fas fa-square-full' => 'fas fa-square-full',
        'fas fa-square-root-alt' => 'fas fa-square-root-alt',
        'fab fa-squarespace' => 'fab fa-squarespace',
        'fab fa-stack-exchange' => 'fab fa-stack-exchange',
        'fab fa-stack-overflow' => 'fab fa-stack-overflow',
        'fab fa-stackpath' => 'fab fa-stackpath',
        'fas fa-stamp' => 'fas fa-stamp',
        'fas fa-star' => 'fas fa-star',
        'fas fa-star-and-crescent' => 'fas fa-star-and-crescent',
        'fas fa-star-half' => 'fas fa-star-half',
        'fas fa-star-half-alt' => 'fas fa-star-half-alt',
        'fas fa-star-of-david' => 'fas fa-star-of-david',
        'fas fa-star-of-life' => 'fas fa-star-of-life',
        'fab fa-staylinked' => 'fab fa-staylinked',
        'fab fa-steam' => 'fab fa-steam',
        'fab fa-steam-square' => 'fab fa-steam-square',
        'fab fa-steam-symbol' => 'fab fa-steam-symbol',
        'fas fa-step-backward' => 'fas fa-step-backward',
        'fas fa-step-forward' => 'fas fa-step-forward',
        'fas fa-stethoscope' => 'fas fa-stethoscope',
        'fab fa-sticker-mule' => 'fab fa-sticker-mule',
        'fas fa-sticky-note' => 'fas fa-sticky-note',
        'fas fa-stop' => 'fas fa-stop',
        'fas fa-stop-circle' => 'fas fa-stop-circle',
        'fas fa-stopwatch' => 'fas fa-stopwatch',
        'fas fa-store' => 'fas fa-store',
        'fas fa-store-alt' => 'fas fa-store-alt',
        'fab fa-strava' => 'fab fa-strava',
        'fas fa-stream' => 'fas fa-stream',
        'fas fa-street-view' => 'fas fa-street-view',
        'fas fa-strikethrough' => 'fas fa-strikethrough',
        'fab fa-stripe' => 'fab fa-stripe',
        'fab fa-stripe-s' => 'fab fa-stripe-s',
        'fas fa-stroopwafel' => 'fas fa-stroopwafel',
        'fab fa-studiovinari' => 'fab fa-studiovinari',
        'fab fa-stumbleupon' => 'fab fa-stumbleupon',
        'fab fa-stumbleupon-circle' => 'fab fa-stumbleupon-circle',
        'fas fa-subscript' => 'fas fa-subscript',
        'fas fa-subway' => 'fas fa-subway',
        'fas fa-suitcase' => 'fas fa-suitcase',
        'fas fa-suitcase-rolling' => 'fas fa-suitcase-rolling',
        'fas fa-sun' => 'fas fa-sun',
        'fab fa-superpowers' => 'fab fa-superpowers',
        'fas fa-superscript' => 'fas fa-superscript',
        'fab fa-supple' => 'fab fa-supple',
        'fas fa-surprise' => 'fas fa-surprise',
        'fab fa-suse' => 'fab fa-suse',
        'fas fa-swatchbook' => 'fas fa-swatchbook',
        'fas fa-swimmer' => 'fas fa-swimmer',
        'fas fa-swimming-pool' => 'fas fa-swimming-pool',
        'fab fa-symfony' => 'fab fa-symfony',
        'fas fa-synagogue' => 'fas fa-synagogue',
        'fas fa-sync' => 'fas fa-sync',
        'fas fa-sync-alt' => 'fas fa-sync-alt',
        'fas fa-syringe' => 'fas fa-syringe',
        'fas fa-table' => 'fas fa-table',
        'fas fa-table-tennis' => 'fas fa-table-tennis',
        'fas fa-tablet' => 'fas fa-tablet',
        'fas fa-tablet-alt' => 'fas fa-tablet-alt',
        'fas fa-tablets' => 'fas fa-tablets',
        'fas fa-tachometer-alt' => 'fas fa-tachometer-alt',
        'fas fa-tag' => 'fas fa-tag',
        'fas fa-tags' => 'fas fa-tags',
        'fas fa-tape' => 'fas fa-tape',
        'fas fa-tasks' => 'fas fa-tasks',
        'fas fa-taxi' => 'fas fa-taxi',
        'fab fa-teamspeak' => 'fab fa-teamspeak',
        'fas fa-teeth' => 'fas fa-teeth',
        'fas fa-teeth-open' => 'fas fa-teeth-open',
        'fab fa-telegram' => 'fab fa-telegram',
        'fab fa-telegram-plane' => 'fab fa-telegram-plane',
        'fas fa-temperature-high' => 'fas fa-temperature-high',
        'fas fa-temperature-low' => 'fas fa-temperature-low',
        'fab fa-tencent-weibo' => 'fab fa-tencent-weibo',
        'fas fa-tenge' => 'fas fa-tenge',
        'fas fa-terminal' => 'fas fa-terminal',
        'fas fa-text-height' => 'fas fa-text-height',
        'fas fa-text-width' => 'fas fa-text-width',
        'fas fa-th' => 'fas fa-th',
        'fas fa-th-large' => 'fas fa-th-large',
        'fas fa-th-list' => 'fas fa-th-list',
        'fab fa-the-red-yeti' => 'fab fa-the-red-yeti',
        'fas fa-theater-masks' => 'fas fa-theater-masks',
        'fab fa-themeco' => 'fab fa-themeco',
        'fab fa-themeisle' => 'fab fa-themeisle',
        'fas fa-thermometer' => 'fas fa-thermometer',
        'fas fa-thermometer-empty' => 'fas fa-thermometer-empty',
        'fas fa-thermometer-full' => 'fas fa-thermometer-full',
        'fas fa-thermometer-half' => 'fas fa-thermometer-half',
        'fas fa-thermometer-quarter' => 'fas fa-thermometer-quarter',
        'fas fa-thermometer-three-quarters' => 'fas fa-thermometer-three-quarters',
        'fab fa-think-peaks' => 'fab fa-think-peaks',
        'fas fa-thumbs-down' => 'fas fa-thumbs-down',
        'fas fa-thumbs-up' => 'fas fa-thumbs-up',
        'fas fa-thumbtack' => 'fas fa-thumbtack',
        'fas fa-ticket-alt' => 'fas fa-ticket-alt',
        'fas fa-times' => 'fas fa-times',
        'fas fa-times-circle' => 'fas fa-times-circle',
        'fas fa-tint' => 'fas fa-tint',
        'fas fa-tint-slash' => 'fas fa-tint-slash',
        'fas fa-tired' => 'fas fa-tired',
        'fas fa-toggle-off' => 'fas fa-toggle-off',
        'fas fa-toggle-on' => 'fas fa-toggle-on',
        'fas fa-toilet' => 'fas fa-toilet',
        'fas fa-toilet-paper' => 'fas fa-toilet-paper',
        'fas fa-toolbox' => 'fas fa-toolbox',
        'fas fa-tools' => 'fas fa-tools',
        'fas fa-tooth' => 'fas fa-tooth',
        'fas fa-torah' => 'fas fa-torah',
        'fas fa-torii-gate' => 'fas fa-torii-gate',
        'fas fa-tractor' => 'fas fa-tractor',
        'fab fa-trade-federation' => 'fab fa-trade-federation',
        'fas fa-trademark' => 'fas fa-trademark',
        'fas fa-traffic-light' => 'fas fa-traffic-light',
        'fas fa-train' => 'fas fa-train',
        'fas fa-tram' => 'fas fa-tram',
        'fas fa-transgender' => 'fas fa-transgender',
        'fas fa-transgender-alt' => 'fas fa-transgender-alt',
        'fas fa-trash' => 'fas fa-trash',
        'fas fa-trash-alt' => 'fas fa-trash-alt',
        'fas fa-trash-restore' => 'fas fa-trash-restore',
        'fas fa-trash-restore-alt' => 'fas fa-trash-restore-alt',
        'fas fa-tree' => 'fas fa-tree',
        'fab fa-trello' => 'fab fa-trello',
        'fab fa-tripadvisor' => 'fab fa-tripadvisor',
        'fas fa-trophy' => 'fas fa-trophy',
        'fas fa-truck' => 'fas fa-truck',
        'fas fa-truck-loading' => 'fas fa-truck-loading',
        'fas fa-truck-monster' => 'fas fa-truck-monster',
        'fas fa-truck-moving' => 'fas fa-truck-moving',
        'fas fa-truck-pickup' => 'fas fa-truck-pickup',
        'fas fa-tshirt' => 'fas fa-tshirt',
        'fas fa-tty' => 'fas fa-tty',
        'fab fa-tumblr' => 'fab fa-tumblr',
        'fab fa-tumblr-square' => 'fab fa-tumblr-square',
        'fas fa-tv' => 'fas fa-tv',
        'fab fa-twitch' => 'fab fa-twitch',
        'fab fa-twitter' => 'fab fa-twitter',
        'fab fa-twitter-square' => 'fab fa-twitter-square',
        'fab fa-typo3' => 'fab fa-typo3',
        'fab fa-uber' => 'fab fa-uber',
        'fab fa-ubuntu' => 'fab fa-ubuntu',
        'fab fa-uikit' => 'fab fa-uikit',
        'fas fa-umbrella' => 'fas fa-umbrella',
        'fas fa-umbrella-beach' => 'fas fa-umbrella-beach',
        'fas fa-underline' => 'fas fa-underline',
        'fas fa-undo' => 'fas fa-undo',
        'fas fa-undo-alt' => 'fas fa-undo-alt',
        'fab fa-uniregistry' => 'fab fa-uniregistry',
        'fas fa-universal-access' => 'fas fa-universal-access',
        'fas fa-university' => 'fas fa-university',
        'fas fa-unlink' => 'fas fa-unlink',
        'fas fa-unlock' => 'fas fa-unlock',
        'fas fa-unlock-alt' => 'fas fa-unlock-alt',
        'fab fa-untappd' => 'fab fa-untappd',
        'fas fa-upload' => 'fas fa-upload',
        'fab fa-ups' => 'fab fa-ups',
        'fab fa-usb' => 'fab fa-usb',
        'fas fa-user' => 'fas fa-user',
        'fas fa-user-alt' => 'fas fa-user-alt',
        'fas fa-user-alt-slash' => 'fas fa-user-alt-slash',
        'fas fa-user-astronaut' => 'fas fa-user-astronaut',
        'fas fa-user-check' => 'fas fa-user-check',
        'fas fa-user-circle' => 'fas fa-user-circle',
        'fas fa-user-clock' => 'fas fa-user-clock',
        'fas fa-user-cog' => 'fas fa-user-cog',
        'fas fa-user-edit' => 'fas fa-user-edit',
        'fas fa-user-friends' => 'fas fa-user-friends',
        'fas fa-user-graduate' => 'fas fa-user-graduate',
        'fas fa-user-injured' => 'fas fa-user-injured',
        'fas fa-user-lock' => 'fas fa-user-lock',
        'fas fa-user-md' => 'fas fa-user-md',
        'fas fa-user-minus' => 'fas fa-user-minus',
        'fas fa-user-ninja' => 'fas fa-user-ninja',
        'fas fa-user-nurse' => 'fas fa-user-nurse',
        'fas fa-user-plus' => 'fas fa-user-plus',
        'fas fa-user-secret' => 'fas fa-user-secret',
        'fas fa-user-shield' => 'fas fa-user-shield',
        'fas fa-user-slash' => 'fas fa-user-slash',
        'fas fa-user-tag' => 'fas fa-user-tag',
        'fas fa-user-tie' => 'fas fa-user-tie',
        'fas fa-user-times' => 'fas fa-user-times',
        'fas fa-users' => 'fas fa-users',
        'fas fa-users-cog' => 'fas fa-users-cog',
        'fab fa-usps' => 'fab fa-usps',
        'fab fa-ussunnah' => 'fab fa-ussunnah',
        'fas fa-utensil-spoon' => 'fas fa-utensil-spoon',
        'fas fa-utensils' => 'fas fa-utensils',
        'fab fa-vaadin' => 'fab fa-vaadin',
        'fas fa-vector-square' => 'fas fa-vector-square',
        'fas fa-venus' => 'fas fa-venus',
        'fas fa-venus-double' => 'fas fa-venus-double',
        'fas fa-venus-mars' => 'fas fa-venus-mars',
        'fab fa-viacoin' => 'fab fa-viacoin',
        'fab fa-viadeo' => 'fab fa-viadeo',
        'fab fa-viadeo-square' => 'fab fa-viadeo-square',
        'fas fa-vial' => 'fas fa-vial',
        'fas fa-vials' => 'fas fa-vials',
        'fab fa-viber' => 'fab fa-viber',
        'fas fa-video' => 'fas fa-video',
        'fas fa-video-slash' => 'fas fa-video-slash',
        'fas fa-vihara' => 'fas fa-vihara',
        'fab fa-vimeo' => 'fab fa-vimeo',
        'fab fa-vimeo-square' => 'fab fa-vimeo-square',
        'fab fa-vimeo-v' => 'fab fa-vimeo-v',
        'fab fa-vine' => 'fab fa-vine',
        'fab fa-vk' => 'fab fa-vk',
        'fab fa-vnv' => 'fab fa-vnv',
        'fas fa-voicemail' => 'fas fa-voicemail',
        'fas fa-volleyball-ball' => 'fas fa-volleyball-ball',
        'fas fa-volume-down' => 'fas fa-volume-down',
        'fas fa-volume-mute' => 'fas fa-volume-mute',
        'fas fa-volume-off' => 'fas fa-volume-off',
        'fas fa-volume-up' => 'fas fa-volume-up',
        'fas fa-vote-yea' => 'fas fa-vote-yea',
        'fas fa-vr-cardboard' => 'fas fa-vr-cardboard',
        'fab fa-vuejs' => 'fab fa-vuejs',
        'fas fa-walking' => 'fas fa-walking',
        'fas fa-wallet' => 'fas fa-wallet',
        'fas fa-warehouse' => 'fas fa-warehouse',
        'fas fa-water' => 'fas fa-water',
        'fas fa-wave-square' => 'fas fa-wave-square',
        'fab fa-waze' => 'fab fa-waze',
        'fab fa-weebly' => 'fab fa-weebly',
        'fab fa-weibo' => 'fab fa-weibo',
        'fas fa-weight' => 'fas fa-weight',
        'fas fa-weight-hanging' => 'fas fa-weight-hanging',
        'fab fa-weixin' => 'fab fa-weixin',
        'fab fa-whatsapp' => 'fab fa-whatsapp',
        'fab fa-whatsapp-square' => 'fab fa-whatsapp-square',
        'fas fa-wheelchair' => 'fas fa-wheelchair',
        'fab fa-whmcs' => 'fab fa-whmcs',
        'fas fa-wifi' => 'fas fa-wifi',
        'fab fa-wikipedia-w' => 'fab fa-wikipedia-w',
        'fas fa-wind' => 'fas fa-wind',
        'fas fa-window-close' => 'fas fa-window-close',
        'fas fa-window-maximize' => 'fas fa-window-maximize',
        'fas fa-window-minimize' => 'fas fa-window-minimize',
        'fas fa-window-restore' => 'fas fa-window-restore',
        'fab fa-windows' => 'fab fa-windows',
        'fas fa-wine-bottle' => 'fas fa-wine-bottle',
        'fas fa-wine-glass' => 'fas fa-wine-glass',
        'fas fa-wine-glass-alt' => 'fas fa-wine-glass-alt',
        'fab fa-wix' => 'fab fa-wix',
        'fab fa-wizards-of-the-coast' => 'fab fa-wizards-of-the-coast',
        'fab fa-wolf-pack-battalion' => 'fab fa-wolf-pack-battalion',
        'fas fa-won-sign' => 'fas fa-won-sign',
        'fab fa-wordpress' => 'fab fa-wordpress',
        'fab fa-wordpress-simple' => 'fab fa-wordpress-simple',
        'fab fa-wpbeginner' => 'fab fa-wpbeginner',
        'fab fa-wpexplorer' => 'fab fa-wpexplorer',
        'fab fa-wpforms' => 'fab fa-wpforms',
        'fab fa-wpressr' => 'fab fa-wpressr',
        'fas fa-wrench' => 'fas fa-wrench',
        'fas fa-x-ray' => 'fas fa-x-ray',
        'fab fa-xbox' => 'fab fa-xbox',
        'fab fa-xing' => 'fab fa-xing',
        'fab fa-xing-square' => 'fab fa-xing-square',
        'fab fa-y-combinator' => 'fab fa-y-combinator',
        'fab fa-yahoo' => 'fab fa-yahoo',
        'fab fa-yammer' => 'fab fa-yammer',
        'fab fa-yandex' => 'fab fa-yandex',
        'fab fa-yandex-international' => 'fab fa-yandex-international',
        'fab fa-yarn' => 'fab fa-yarn',
        'fab fa-yelp' => 'fab fa-yelp',
        'fas fa-yen-sign' => 'fas fa-yen-sign',
        'fas fa-yin-yang' => 'fas fa-yin-yang',
        'fab fa-yoast' => 'fab fa-yoast',
        'fab fa-youtube' => 'fab fa-youtube',
        'fab fa-youtube-square' => 'fab fa-youtube-square',
        'fab fa-zhihu' => 'fab fa-zhihu'
    );

      #Animations list
      $animations_list = array(
        'bounce' => 'bounce',
        'flash' => 'flash',
        'pulse' => 'pulse',
        'rubberBand' => 'rubberBand',
        'shake' => 'shake',
        'swing' => 'swing',
        'tada' => 'tada',
        'wobble' => 'wobble',
        'bounceIn' => 'bounceIn',
        'bounceInDown' => 'bounceInDown',
        'bounceInLeft' => 'bounceInLeft',
        'bounceInRight' => 'bounceInRight',
        'bounceInUp' => 'bounceInUp',
        'bounceOut' => 'bounceOut',
        'bounceOutDown' => 'bounceOutDown',
        'bounceOutLeft' => 'bounceOutLeft',
        'bounceOutRight' => 'bounceOutRight',
        'bounceOutUp' => 'bounceOutUp',
        'fadeIn' => 'fadeIn',
        'fadeInDown' => 'fadeInDown',
        'fadeInDownBig' => 'fadeInDownBig',
        'fadeInLeft' => 'fadeInLeft',
        'fadeInLeftBig' => 'fadeInLeftBig',
        'fadeInRight' => 'fadeInRight',
        'fadeInRightBig' => 'fadeInRightBig',
        'fadeInUp' => 'fadeInUp',
        'fadeInUpBig' => 'fadeInUpBig',
        'fadeOut' => 'fadeOut',
        'fadeOutDown' => 'fadeOutDown',
        'fadeOutDownBig' => 'fadeOutDownBig',
        'fadeOutLeft' => 'fadeOutLeft',
        'fadeOutLeftBig' => 'fadeOutLeftBig',
        'fadeOutRight' => 'fadeOutRight',
        'fadeOutRightBi' => 'fadeOutRightBig',
        'fadeOutUp' => 'fadeOutUp',
        'fadeOutUpBig' => 'fadeOutUpBig',
        'flip' => 'flip',
        'flipInX' => 'flipInX',
        'flipInY' => 'flipInY',
        'flipOutX' => 'flipOutX',
        'flipOutY' => 'flipOutY',
        'lightSpeedIn' => 'lightSpeedIn',
        'lightSpeedOut' => 'lightSpeedOut',
        'rotateIn' => 'rotateIn',
        'rotateInDownLe' => 'rotateInDownLeft',
        'rotateInDownRi' => 'rotateInDownRight',
        'rotateInUpLeft' => 'rotateInUpLeft',
        'rotateInUpRigh' => 'rotateInUpRight',
        'rotateOut' => 'rotateOut',
        'rotateOutDownL' => 'rotateOutDownLeft',
        'rotateOutDownR' => 'rotateOutDownRight',
        'rotateOutUpLef' => 'rotateOutUpLeft',
        'rotateOutUpRig' => 'rotateOutUpRight',
        'hinge' => 'hinge',
        'rollIn' => 'rollIn',
        'rollOut' => 'rollOut',
        'zoomIn' => 'zoomIn',
        'zoomInDown' => 'zoomInDown',
        'zoomInLeft' => 'zoomInLeft',
        'zoomInRight' => 'zoomInRight',
        'zoomInUp' => 'zoomInUp',
        'zoomOut' => 'zoomOut',
        'zoomOutDown' => 'zoomOutDown',
        'zoomOutLeft' => 'zoomOutLeft',
        'zoomOutRight' => 'zoomOutRight',
        'zoomOutUp' => 'zoomOutUp'
      );



      if ( function_exists('vc_map') ) {
        // iBid - Contact form
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Contact form", 'modeltheme'),
           "base" => "contact_form",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Contact-form.svg', __FILE__ ),
           "params" => array(
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
          )
        );


        // iBid - Testimonials Slider v2
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Testimonials Slider v2", 'modeltheme'),
           "base" => "testimonials-style2",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/testimonials-slider.svg', __FILE__ ),
           "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Number of testimonials", 'modeltheme' ),
                    "param_name" => "content",
                    "value" => esc_attr__( "5", "ibid" ),
                    "description" => esc_attr__( "Enter number of testimonials to show.", 'modeltheme' )
                ),
                array (
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Style Variant", 'modeltheme'),
                    "param_name" => "style_type",
                    "value" => array(
                        'Default'                               => 'default',
                        'Style v2 (Government Surplus demo)'    => 'style_v2'
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_attr__("Animation", 'modeltheme'),
                    "param_name" => "animation",
                    "std" => 'fadeInLeft',
                    "holder" => "div",
                    "class" => "",
                    "value" => $animations_list
              )
           )
        ));


        // iBid - Testimonials v1
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Testimonials v1", 'modeltheme'),
           "base" => "testimonials",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/testimonials.svg', __FILE__ ),
           "params" => array(
              array(
                "group" => "Settings",
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              ),
              array(
                "group" => "Settings",
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              ),
              array(
                "group" => "Settings",
                "type" => "dropdown",
                "heading" => esc_attr__("Visible Testimonials per slide", 'modeltheme'),
                "param_name" => "visible_items",
                "value" => array(
                  esc_attr__('1', 'modeltheme')   => '1',
                  esc_attr__('2', 'modeltheme')   => '2',
                  esc_attr__('3', 'modeltheme')   => '3',
                  ),
                "std" => '2',
                "holder" => "div",
                "class" => ""
              ),
              array(
                 "group" => "Styling",
                 "type" => "colorpicker",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Testimonials border color", 'modeltheme'),
                 "param_name" => "testimonial_border_color"
              )
            )
        ));


        // iBid - Service icon with text
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Service icon with text", 'modeltheme'),
           "base" => "service",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/service-icon-with-text.svg', __FILE__ ),
           "params" => array(
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Icon class(FontAwesome)", 'modeltheme'),
                "param_name" => "icon",
                "std" => 'fab fa-youtube',
                "holder" => "div",
                "class" => "",
                "value" => $fa_list
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Title", 'modeltheme'),
                 "param_name" => "title",
                 "value" => esc_attr__("Graphic Design", 'modeltheme')
              ),
              array(
                 "type" => "textarea",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Description", 'modeltheme'),
                 "param_name" => "description",
                 "value" => esc_attr__("Working with us you will work with professional certified designers and engineers having a vast experience.", 'modeltheme')
              )
           )
        ));


        // iBid - Shop feature
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Shop feature", 'modeltheme'),
           "base" => "shop-feature",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Shop-Feature.svg', __FILE__ ),
           "params" => array(
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Icon class(FontAwesome)", 'modeltheme'),
                "param_name" => "icon",
                "std" => 'fab fa-youtube',
                "holder" => "div",
                "class" => "",
                "value" => $fa_list
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Title", 'modeltheme'),
                 "param_name" => "heading"
              ),
              array(
                 "type" => "textarea",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Description", 'modeltheme'),
                 "param_name" => "subheading"
              )
           )
        ));


        // iBid - Posts calendar
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Posts calendar", 'modeltheme'),
           "base" => "posts_calendar",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Posts-Calendar.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Section title", 'modeltheme'),
                 "param_name" => "title",
                 "value" => esc_attr__("Posts calendar", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of posts to show", 'modeltheme'),
                 "param_name" => "number",
                 "value" => esc_attr__("3", 'modeltheme')
              )
           )
        ));


        // iBid - Jumbotron
        vc_map(
          array(
           "name" => esc_attr__("iBid - Jumbotron", 'modeltheme'),
           "base" => "jumbotron",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/map_pins.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Heading", 'modeltheme'),
                 "param_name" => "heading",
                 "value" => esc_attr__("Hello, world!", 'modeltheme')
              ),
              array(
                 "type" => "textarea",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Sub heading", 'modeltheme'),
                 "param_name" => "sub_heading",
                 "value" => esc_attr__("This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button text", 'modeltheme'),
                 "param_name" => "button_text",
                 "value" => esc_attr__("Learn more", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button url", 'modeltheme'),
                 "param_name" => "button_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Alert
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Alert", 'modeltheme'),
           "base" => "alert",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Alert.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Alert style", 'modeltheme'),
                 "param_name" => "alert_style",
                 "std" => 'success',
                 "value" => array(
                  'Success'     => 'success',
                  'Info'        => 'info',
                  'Warning'     => 'warning',
                  'Danger'      => 'danger'
                 )
              ),
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Is dismissible?", 'modeltheme'),
                 "param_name" => "alert_dismissible",
                 "std" => 'yes',
                 "value" => array(
                  'Yes'    => 'yes',
                  'No'     => 'no'
                  )
              ),
              array(
                 "type" => "textarea",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Alert text", 'modeltheme'),
                 "param_name" => "alert_text",
                 "value" => "<strong>Well done!</strong> You successfully read this important alert message."
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Progress bar
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Progress bar", 'modeltheme'),
           "base" => "progress_bar",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/progress-bar.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Progress bar scope", 'modeltheme'),
                 "param_name" => "bar_scope",
                 "std" => 'success',
                 "value" => array(
                  'Success'     => 'success',
                  'Info'        => 'info',
                  'Warning'     => 'warning',
                  'Danger'      => 'danger'
                 )
              ),
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Progress bar style", 'modeltheme'),
                 "param_name" => "bar_style",
                 "std" => 'simple',
                 "value" => array(
                  'Simple'     => 'simple',
                  'Striped'    => 'progress-bar-striped'
                 )
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Progress bar value (1-100)", 'modeltheme'),
                 "param_name" => "bar_value",
                 "value" => esc_attr__("40", 'modeltheme')
              ),
              array(
                 "type" => "textarea",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Progress bar label", 'modeltheme'),
                 "param_name" => "bar_label",
                 "value" => esc_attr__("40% Complete", 'modeltheme')
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )

           )
        ));


        // iBid - Panel
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Panel", 'modeltheme'),
           "base" => "panel",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Panel.svg', __FILE__ ),
           "params" => array(
                array(
                  "type"         => "dropdown",
                  "holder"       => "div",
                  "class"        => "",
                  "param_name"   => "panel_style",
                  "std"          => 'success',
                  "heading"      => esc_attr__("Panel style", 'modeltheme'),
                  "value"        => array(
                    'Success' => 'success',
                    'Info'    => 'info',
                    'Warning' => 'warning',
                    'Danger'  => 'danger'
                )
              ),
              array(
                 "type"         => "textfield",
                 "holder"       => "div",
                 "class"        => "",
                 "param_name"   => "panel_title",
                 "heading"      => esc_attr__("Panel title", 'modeltheme'),
                 "value"        => esc_attr__("Panel title", 'modeltheme')
              ),
              array(
                 "type"         => "textarea",
                 "holder"       => "div",
                 "class"        => "",
                 "param_name"   => "panel_content",
                 "heading"      => esc_attr__("Panel content", 'modeltheme'),
                 "value"        => esc_attr__("Panel content", 'modeltheme')
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Featured post
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Featured post", 'modeltheme'),
           "base" => "featured_post",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Featured-Post.svg', __FILE__ ),
           "params" => array(
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Section heading icon", 'modeltheme'),
                "param_name" => "icon",
                "std" => 'far fa-play-circle',
                "holder" => "div",
                "class" => "",
                "value" => $fa_list
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Section title", 'modeltheme'),
                 "param_name" => "title",
                 "value" => esc_attr__("Featured blog post", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Please type a post ID", 'modeltheme'),
                 "param_name" => "postid",
                 "value" => esc_attr__("138", 'modeltheme')
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Service style2
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Service style2", 'modeltheme'),
           "base" => "service_style2",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/service-icon-with-text.svg', __FILE__ ),
           "params" => array(
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Icon class(FontAwesome)", 'modeltheme'),
                "param_name" => "icon",
                "std" => 'fas fa-space-shuttle',
                "holder" => "div",
                "class" => "",
                "value" => $fa_list
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Title", 'modeltheme'),
                 "param_name" => "title",
                 "value" => esc_attr__("Graphic Design", 'modeltheme')
              ),
              array(
                 "type" => "textarea",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Description", 'modeltheme'),
                 "param_name" => "description",
                 "value" => esc_attr__("Working with us you will work with professional certified designers and engineers having a vast experience.", 'modeltheme')
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Skill counter
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Skill counter", 'modeltheme'),
           "base" => "mt_skill",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/skill-counter.svg', __FILE__ ),
           "params" => array(
            array(
               "group" => "Options",
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Skill media"),
               "param_name" => "icon_or_image",
               "std" => '',
               "description" => esc_attr__("Choose what you want to use: empty/image/icon"),
               "value" => array(
                'Nothing'     => 'choosed_nothing',
                'Use an image'     => 'choosed_image',
                'Use an icon'      => 'choosed_icon'
                )
            ),
            array(
              "group" => "Options",
              "dependency" => array(
               'element' => 'icon_or_image',
               'value' => array( 'choosed_icon' ),
               ),
              "type" => "dropdown",
              "heading" => esc_attr__("Icon class", 'modeltheme'),
              "param_name" => "icon",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $fa_list
            ),
            array(
              "group" => "Options",
              "dependency" => array(
               'element' => 'icon_or_image',
               'value' => array( 'choosed_image' ),
               ),
              "type" => "attach_images",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Choose image", 'modeltheme' ),
              "param_name" => "image_skill",
              "value" => "",
              "description" => esc_attr__( "Choose image for skill", 'modeltheme' )
            ),
            array(
               "group" => "Options",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Title", 'modeltheme'),
               "param_name" => "title",
               "value" => "",
               "description" => ""
            ),
            array(
              "group" => "Styling",
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_attr__( "Background Color", 'modeltheme' ),
              "param_name" => "bg_color",
              "value" => "", //Default color
              "description" => esc_attr__( "Choose background color", 'modeltheme' )
            ),
            array(
              "group" => "Styling",
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_attr__( "Border Color", 'modeltheme' ),
              "param_name" => "border_color",
              "value" => "", //Default color
              "description" => esc_attr__( "Choose border color", 'modeltheme' )
            ),
            array(
              "group" => "Styling",
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_attr__( "Title color", 'modeltheme' ),
              "param_name" => "title_color",
              "value" => "", //Default color
              "description" => esc_attr__( "Choose text color", 'modeltheme' )
            ),
            array(
              "group" => "Styling",
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_attr__( "Skill value color", 'modeltheme' ),
              "param_name" => "skill_color_value",
              "value" => "", //Default color
              "description" => esc_attr__( "Choose skill value color", 'modeltheme' )
            ),
            array(
               "group" => "Options",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Skill value", 'modeltheme'),
               "param_name" => "skillvalue",
               "value" => "",
               "description" => ""
            ),
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation", 'modeltheme'),
              "param_name" => "animation",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $animations_list
            )
         )
        ));


        // iBid - Pricing table
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Pricing table", 'modeltheme'),
           "base" => "pricing-table",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/pricing-table.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package name", 'modeltheme'),
                 "param_name" => "package_name",
                 "value" => esc_attr__("BASIC", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package price", 'modeltheme'),
                 "param_name" => "package_price",
                 "value" => esc_attr__("199", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package currency", 'modeltheme'),
                 "param_name" => "package_currency",
                 "value" => esc_attr__("$", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package basis", 'modeltheme'),
                 "param_name" => "package_basis",
                 "value" => esc_attr__("/ month", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package's 1st feature", 'modeltheme'),
                 "param_name" => "package_feature1",
                 "value" => esc_attr__("05 Email Account", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package's 2nd feature", 'modeltheme'),
                 "param_name" => "package_feature2",
                 "value" => esc_attr__("01 Website Layout", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package's 3rd feature", 'modeltheme'),
                 "param_name" => "package_feature3",
                 "value" => esc_attr__("03 Photo Stock Banner", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package's 4th feature", 'modeltheme'),
                 "param_name" => "package_feature4",
                 "value" => esc_attr__("01 Javascript Slider", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package's 5th feature", 'modeltheme'),
                 "param_name" => "package_feature5",
                 "value" => esc_attr__("01 Hosting", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package's 6th feature", 'modeltheme'),
                 "param_name" => "package_feature6",
                 "value" => esc_attr__("01 Domain Name Server", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package button url", 'modeltheme'),
                 "param_name" => "button_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Package button text", 'modeltheme'),
                 "param_name" => "button_text",
                 "value" => esc_attr__("Purchase", 'modeltheme')
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Recommended?", 'modeltheme'),
                "param_name" => "recommended",
                "value" => array(
                  esc_attr__('Simple', 'modeltheme')      => 'simple',
                  esc_attr__('Recommended', 'modeltheme') => 'recommended',
                  ),
                "std" => 'simple',
                "holder" => "div",
                "class" => ""
              )
           )
        ));


        // iBid - Heading with Border
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Heading with Border", 'modeltheme'),
           "base" => "heading-border",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/section-title-heading.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "dropdown",
                "heading" => esc_attr__("Alignment", 'modeltheme'),
                "param_name" => "align",
                "std" => 'left',
                "holder" => "div",
                "class" => "",
                "value" => array(
                    'left' => 'left',
                    'right' => 'right',
                    )
              ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Heading", 'modeltheme' ),
                  "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                  "value" => "OUR<br>WORK",
                  "description" => esc_attr__( "Enter your heading.", 'modeltheme' )
               ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Social icons
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Social icons", 'modeltheme'),
           "base" => "social_icons",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Social-Icons.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Facebook URL", 'modeltheme' ),
                  "param_name" => "facebook",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your facebook link.", 'modeltheme' )
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Twitter URL", 'modeltheme' ),
                  "param_name" => "twitter",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your twitter link.", 'modeltheme' )
               ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Pinterest URL", 'modeltheme' ),
                  "param_name" => "pinterest",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your pinterest link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Google Plus URL", 'modeltheme' ),
                  "param_name" => "googleplus",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your Google+ link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Skype Username", 'modeltheme' ),
                  "param_name" => "skype",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your Skype Username.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Instagram URL", 'modeltheme' ),
                  "param_name" => "instagram",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your instagram link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "YouTube URL", 'modeltheme' ),
                  "param_name" => "youtube",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your YouTube link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "LinkedIn URL", 'modeltheme' ),
                  "param_name" => "linkedin",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your linkedin link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Dribbble URL", 'modeltheme' ),
                  "param_name" => "dribbble",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your dribbble link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Deviantart URL", 'modeltheme' ),
                  "param_name" => "deviantart",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your deviantart link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Digg URL", 'modeltheme' ),
                  "param_name" => "digg",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your digg link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Flickr URL", 'modeltheme' ),
                  "param_name" => "flickr",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your flickr link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Stumbleupon URL", 'modeltheme' ),
                  "param_name" => "stumbleupon",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your stumbleupon link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Tumblr URL", 'modeltheme' ),
                  "param_name" => "tumblr",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your tumblr link.", 'modeltheme' )
              ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Vimeo URL", 'modeltheme' ),
                  "param_name" => "vimeo",
                  "value" => esc_attr__( "#", "ibid" ),
                  "description" => esc_attr__( "Enter your vimeo link.", 'modeltheme' )
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - List group
        vc_map( 
          array(
           "name" => esc_attr__("iBid - List group", 'modeltheme'),
           "base" => "list_group",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/list-group.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "List group item heading", 'modeltheme' ),
                  "param_name" => "heading",
                  "value" => esc_attr__( "List group item heading", "ibid" )
               ),
               array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "List group item description", 'modeltheme' ),
                  "param_name" => "description",
                  "value" => esc_attr__( "Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.", "ibid" )
               ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Status", 'modeltheme'),
                "param_name" => "active",
                "value" => array(
                  esc_attr__('Active', 'modeltheme')   => 'active',
                  esc_attr__('Normal', 'modeltheme')   => 'normal',
                  ),
                "std" => 'normal',
                "holder" => "div",
                "class" => ""
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));


        // iBid - Button
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Button", 'modeltheme'),
           "base" => "ibid_btn",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/button.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Button text", 'modeltheme' ),
                  "param_name" => "btn_text",
                  "value" => esc_attr__( "Shop now", "ibid" )
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Button url", 'modeltheme' ),
                  "param_name" => "btn_url",
                  "value" => esc_attr__( "#", "ibid" )
               ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Button size", 'modeltheme'),
                "param_name" => "btn_size",
                "value" => array(
                  esc_attr__('Small', 'modeltheme')   => 'btn btn-sm',
                  esc_attr__('Medium', 'modeltheme')   => 'btn btn-medium',
                  esc_attr__('Large', 'modeltheme')   => 'btn btn-lg'
                  ),
                "std" => 'normal',
                "holder" => "div",
                "class" => ""
              ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Alignment", 'modeltheme'),
                "param_name" => "align",
                "value" => array(
                  esc_attr__('Left', 'modeltheme')   => 'text-left',
                  esc_attr__('Center', 'modeltheme')   => 'text-center',
                  esc_attr__('Right', 'modeltheme')   => 'text-right'
                  ),
                "std" => 'normal',
                "holder" => "div",
                "class" => ""
              )
           )
        ));


        // iBid - Thumbnails custom content
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Thumbnails custom content", 'modeltheme'),
           "base" => "thumbnails_custom_content",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Thumbnail.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "attach_image",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Image source url", 'modeltheme' ),
                  "param_name" => "image",
                  "value" => esc_attr__( "#", "ibid" )
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Heading", 'modeltheme' ),
                  "param_name" => "heading",
                  "value" => esc_attr__( "Thumbnail label", "ibid" )
               ),
               array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Description", 'modeltheme' ),
                  "param_name" => "description",
                  "value" => esc_attr__( "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.", "ibid" )
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Button URL", 'modeltheme' ),
                  "param_name" => "button_url",
                  "value" => esc_attr__( "#", "ibid" )
               ),
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Button text", 'modeltheme' ),
                  "param_name" => "button_text",
                  "value" => esc_attr__( "Button", "ibid" )
               ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "value" => $animations_list
              )
           )
        ));



        // iBid - Heading with bottom border
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Heading with bottom border", 'modeltheme'),
           "base" => "heading_border_bottom",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/heading.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Heading", 'modeltheme' ),
                  "param_name" => "heading",
                  "value" => esc_attr__( "Our Work", "ibid" )
               ),
              array(
                "type" => "dropdown",
                "heading" => esc_attr__("Heading align(left/right)", 'modeltheme'),
                "param_name" => "text_align",
                "value" => array(
                  esc_attr__('Left', 'modeltheme')   => 'text-left',
                  esc_attr__('Right', 'modeltheme')   => 'text-right',
                  ),
                "std" => 'text-left',
                "holder" => "div",
                "class" => ""
              ),
           )
        ));


        // iBid - Call to Action
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Call to Action", 'modeltheme'),
           "base" => "ibid-call-to-action",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/call-to-action.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Heading", 'modeltheme' ),
                  "param_name" => "heading",
                  "value" => esc_attr__( "ibid Is The Ultimate WordPress Multi-Purpose WordPress Theme!", "ibid" )
               ),
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Heading type", 'modeltheme'),
                 "param_name" => "heading_type",
                 "std" => 'h2',
                 "value" => array(
                  'Heading H1'     => 'h1',
                  'Heading H2'     => 'h2',
                  'Heading H3'     => 'h3',
                  'Heading H4'     => 'h4',
                  'Heading H5'     => 'h5',
                  'Heading H6'     => 'h6'
                 )
              ),
               array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Subheading", 'modeltheme' ),
                  "param_name" => "subheading",
                  "value" => esc_attr__( "Loaded with awesome features like Visual Composer, premium sliders, unlimited colors, advanced theme options & more!", "ibid" )
               ),
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Text align", 'modeltheme'),
                 "param_name" => "align",
                 "std" => 'text-left',
                 "description" => esc_attr__("Text align of Title and subtitle", 'modeltheme'),
                 "value" => array(
                  'Align left'     => 'text-left',
                  'Align center'        => 'text-center',
                  'Align right'     => 'text-right'
                 )
              ),
           )
        ));


        // iBid - Section Title & Subtitle
        vc_map(
          array(
           "name" => __("iBid - Section Title and Subtitle", 'modeltheme'),
           "base" => "heading_title_subtitle",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/section-title-heading.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Section title", 'modeltheme' ),
                  "param_name" => "title",
                  "value" => "OUR <span>SERVICES</span>"
               ),
               array(
                  "type" => "attach_image",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Separator (Optional)", 'modeltheme' ),
                  "description" => esc_attr__("If this option is empty, default theme separator will be applied.", 'modeltheme'),
                  "param_name" => "separator",
               ),
               array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Section subtitle", 'modeltheme' ),
                  "param_name" => "subtitle",
                  "value" => esc_attr__( "We have a lot of opportunities for you. Come check them out!", "ibid" )
               ),
               array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Disable separator?", 'modeltheme'),
                 "param_name" => "disable_sep",
                 "value" => array(
                      'Select Option'               => '',
                      'No'                   => '',
                      'Yes'                  => 'disable_sep'
                     )
                ),
               array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Title style", 'modeltheme'),
                 "param_name" => "title_style",
                 "value" => array(
                      'Select Title Style'        => '',
                      'Uppercase'     => '',
                      'Capitalize'    => 'capitalize'
                     )
                ),
               array(
                 "group" => "Styling",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Title Color", 'modeltheme'),
                 "param_name" => "title_color",
                 "value" => array(
                      'Select Title Color'   => '',
                      'Dark'     => '',
                      'Light'    => 'light'
                     )
                ),
               array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__("Choose Delimitator color", 'modeltheme'),
                  "param_name" => "delimitator_color"
               ),
           )
        ));


        #27. Section Title&Subtitle
        vc_map( 
          array(
           "name" => __("iBid - Section Title and Subtitle w/ button", 'modeltheme'),
           "base" => "heading_title_subtitle_v2",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/section-title-heading.svg', __FILE__ ),
           "params" => array(
               array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Section title", 'modeltheme' ),
                  "param_name" => "title",
                  "value" => "OUR <span>SERVICES</span>"
               ),
               array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Section subtitle", 'modeltheme' ),
                  "param_name" => "subtitle",
                  "value" => esc_attr__( "We have a lot of opportunities for you. Come check them out!", "ibid" )
               ),
               array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_attr__( "Button Text", 'modeltheme'),
                        "param_name" => "button_text",
                        "value" => "",
                        "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Button Link", 'modeltheme'),
                    "param_name" => "button_link",
                    "value" => "",
                    "description" => ""
                ),
           )
        ));


        $post_category_tax = get_terms('category');
        $post_category = array();
        if ($post_category_tax) {
          foreach ( $post_category_tax as $term ) {
             $post_category[$term->name] = $term->slug;
          }
        }

        // iBid - Blog Posts
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Blog Posts", 'modeltheme'),
           "base" => "ibid-blog-posts",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/blog.svg', __FILE__ ),
           "params" => array(
               array(
                  "group" => "Settings",
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Number", 'modeltheme' ),
                  "param_name" => "number",
                  "value" => esc_attr__( "3", "ibid" )
               ),
               array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Blog Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $post_category
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Columns", 'modeltheme'),
                 "param_name" => "columns",
                 "value" => array(
                  '2 columns'     => 'vc_col-md-6',
                  '3 columns'     => 'vc_col-md-4',
                  '4 columns'     => 'vc_col-md-3'
                 )
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Layout", 'modeltheme'),
                 "param_name" => "layout",
                 "value" => array(
                 'Select Layout'        => '',
                  'Image Left'     => 'image_left',
                  'Image Top'     => 'image_top'
                 )
              ),
              array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__("Choose overlay color", 'modeltheme'),
                  "param_name" => "overlay_color"
               ),
               array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__("Choose text color", 'modeltheme'),
                  "param_name" => "text_color"
               )
           )
        ));


        // iBid - Blog Posts Boxed
        vc_map(
          array(
           "name" => esc_attr__("iBid - Blog Posts Boxed", 'modeltheme'),
           "base" => "ibid-blog-boxed",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/blog.svg', __FILE__ ),
           "params" => array(
               array(
                  "group" => "Settings",
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Number", 'modeltheme' ),
                  "param_name" => "number",
                  "value" => esc_attr__( "3", "ibid" )
               ),
               array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Blog Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $post_category
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Columns", 'modeltheme'),
                 "param_name" => "columns",
                 "value" => array(
                  '2 columns'     => 'vc_col-md-6',
                  '3 columns'     => 'vc_col-md-4'
                 )
              ),
              array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__("Choose overlay color", 'modeltheme'),
                  "param_name" => "overlay_color"
               ),
               array(
                  "group" => "Styling",
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__("Choose text color", 'modeltheme'),
                  "param_name" => "text_color"
               )
           )
        ));

        // iBid - Blog Posts v2
        vc_map(
            array(
                "name" => esc_attr__("iBid - Blog Posts v2", 'modeltheme'),
                "base" => "ibid-blog-v2",
                "category" => esc_attr__('iBid', 'modeltheme'),
                "icon" => plugins_url( 'images/blog.svg', __FILE__ ),
                "params" => array(
                array(
                    "group" => "Settings",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Number", 'modeltheme' ),
                    "param_name" => "number",
                    "value" => esc_attr__( "3", "ibid" )
                ),
                array(
                    "group" => "Settings",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Select Blog Category", 'modeltheme'),
                    "param_name" => "category",
                    "description" => esc_attr__("Please select blog category", 'modeltheme'),
                    "std" => 'Default value',
                    "value" => $post_category
                ),
                array(
                    "group" => "Settings",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Columns", 'modeltheme'),
                    "param_name" => "columns",
                    "value" => array(
                        '2 columns'     => 'vc_col-md-6',
                        '3 columns'     => 'vc_col-md-4'
                    )
                ),
                array(
                    "group" => "Settings",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Style Variant", 'modeltheme'),
                    "param_name" => "style_variant",
                    "value" => array(
                        'Default'     => 'default',
                        'Style v2 (Government Surplus demo)'     => 'style_2'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Choose overlay color", 'modeltheme'),
                    "param_name" => "overlay_color"
                ),
                array(
                    "group" => "Styling",
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Choose text color", 'modeltheme'),
                    "param_name" => "text_color"
                )
            )
        ));

        // iBid - Masonry Banners
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Masonry Banners", 'modeltheme'),
           "base" => "shop-masonry-banners",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/masonry-banners.svg', __FILE__ ),
           "params" => array(
              
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Image", 'modeltheme'),
                 "param_name" => "banner_1_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Title", 'modeltheme'),
                 "param_name" => "banner_1_title",
                 "value" => esc_attr__("Sofas", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_1_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Link", 'modeltheme'),
                 "param_name" => "banner_1_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Image", 'modeltheme'),
                 "param_name" => "banner_2_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Title", 'modeltheme'),
                 "param_name" => "banner_2_title",
                 "value" => esc_attr__("Beds", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_2_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Link", 'modeltheme'),
                 "param_name" => "banner_2_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Image", 'modeltheme'),
                 "param_name" => "banner_3_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Title", 'modeltheme'),
                 "param_name" => "banner_3_title",
                 "value" => esc_attr__("Chairs", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_3_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Link", 'modeltheme'),
                 "param_name" => "banner_3_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#4 Banner Image", 'modeltheme'),
                 "param_name" => "banner_4_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#4 Banner Title", 'modeltheme'),
                 "param_name" => "banner_4_title",
                 "value" => esc_attr__("Chairs", 'modeltheme')
              ),
               array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#4 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_4_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#4 Banner Link", 'modeltheme'),
                 "param_name" => "banner_4_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Styling",
                 "type" => "colorpicker",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Default skin background color", 'modeltheme'),
                 "param_name" => "default_skin_background_color"
              ),
              array(
                 "group" => "Styling",
                 "type" => "colorpicker",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Dark skin background color", 'modeltheme'),
                 "param_name" => "dark_skin_background_color"
              ),
              array(
                 "group" => "Styling",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button Style", 'modeltheme'),
                 "param_name" => "button_style",
                 "std" => 'round',
                 "value" => array(
                  'Rounded'                 => 'round',
                  'Boxed with Color'        => 'boxed'
                 ),
              ),
           )
        ));  


        // iBid - Domain Masonry Banners
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Domain Masonry Banners", 'modeltheme'),
           "base" => "domain-masonry-banners",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/domains-list.svg', __FILE__ ),
           "params" => array(
              
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Image", 'modeltheme'),
                 "param_name" => "banner_1_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
               array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Prefix", 'modeltheme'),
                 "param_name" => "banner_1_prefix",
                 "value" => esc_attr__(".eu", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Title", 'modeltheme'),
                 "param_name" => "banner_1_title",
                 "value" => esc_attr__("Sofas", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_1_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#1 Banner Link", 'modeltheme'),
                 "param_name" => "banner_1_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Image", 'modeltheme'),
                 "param_name" => "banner_2_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Prefix", 'modeltheme'),
                 "param_name" => "banner_2_prefix",
                 "value" => esc_attr__(".eu", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Title", 'modeltheme'),
                 "param_name" => "banner_2_title",
                 "value" => esc_attr__("Beds", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_2_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#2 Banner Link", 'modeltheme'),
                 "param_name" => "banner_2_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Image", 'modeltheme'),
                 "param_name" => "banner_3_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Prefix", 'modeltheme'),
                 "param_name" => "banner_3_prefix",
                 "value" => esc_attr__(".eu", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Title", 'modeltheme'),
                 "param_name" => "banner_3_title",
                 "value" => esc_attr__("Chairs", 'modeltheme')
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_3_count"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("#3 Banner Link", 'modeltheme'),
                 "param_name" => "banner_3_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
            
              array(
                 "group" => "Styling",
                 "type" => "colorpicker",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Default skin background color", 'modeltheme'),
                 "param_name" => "default_skin_background_color"
              ),
              array(
                 "group" => "Styling",
                 "type" => "colorpicker",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Dark skin background color", 'modeltheme'),
                 "param_name" => "dark_skin_background_color"
              ),
              array(
                 "group" => "Styling",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button Style", 'modeltheme'),
                 "param_name" => "button_style",
                 "std" => 'round',
                 "value" => array(
                  'Rounded'                 => 'round',
                  'Boxed with Color'        => 'boxed'
                 ),
              ),
           )
        ));


        #30. Sale banner
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Sale Banner", 'modeltheme'),
           "base" => "sale-banner",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Sale-Banner.svg', __FILE__ ),
           "params" => array(
              array(
                 "type" => "attach_image",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Banner Image", 'modeltheme'),
                 "param_name" => "banner_img",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Banner Title", 'modeltheme'),
                 "param_name" => "banner_button_text",
                 "value" => esc_attr__("Read more", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Banner Subtitle", 'modeltheme'),
                 "param_name" => "banner_button_count",
                 "value" => esc_attr__("9 products", 'modeltheme')
              ),
              array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Banner url", 'modeltheme'),
                 "param_name" => "banner_button_url",
                 "value" => esc_attr__("#", 'modeltheme')
              ),
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Title Position", 'modeltheme'),
                 "param_name" => "layout",
                 "std" => '2',
                 "value" => array(
                  'Select Layout'        => '',
                  'Bottom Left'          => 'bottom',
                  'Center'               => 'center',
                  'Half Right'           => 'right'
                 ),
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Title color", 'modeltheme' ),
                "param_name" => "title_color",
                "value" => "" //Default color
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Subtitle color", 'modeltheme' ),
                "param_name" => "subtitle_color",
                "value" => "" //Default color
              ),
           )
        ));  


        // Products Filter Main
        $all_attributes = array();
        if (function_exists('wc_get_attribute_taxonomies')) {
          $attribute_taxonomies = wc_get_attribute_taxonomies();
          if ( $attribute_taxonomies ) {
            foreach ( $attribute_taxonomies as $tax ) {
              $all_attributes[$tax->attribute_name ] = $tax->attribute_name;
            }
          }
        }
        $search_filter = array('Choose' => 'Null','Search Enabled ' => 'search_on', 'Search Disabled' => 'search_off');
        $categories_filter = array('Choose' => 'Null','Categories Enabled ' => 'categories_on', 'Categories Disabled' => 'categories_off');
        $tags_filter = array('Choose' => 'Null','Tags Enabled ' => 'tags_on', 'Tags Disabled' => 'tags_off');

        // iBid - Product Filters
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Product Filters", 'modeltheme'),
           "base" => "product_filters",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Product-Filters.svg', __FILE__ ),
           "params" => array(
            array(
              "group" => "Options",
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Number of products", 'modeltheme' ),
              "param_name" => "number",
              "value" => "",
              "description" => esc_attr__( "Enter number of products post to show.", 'modeltheme' )
            ),
            array(
               "group" => "Filters",
               "type" => "checkbox",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Select Products Attributes", 'modeltheme'),
               "param_name" => "attribute",
               "description" => esc_attr__("The selected attributes will be used to filter the products from the left side", 'modeltheme'),
               "std" => 'Default value',
               "value" => $all_attributes,
            ),
            array(
             "group" => "Options",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Show all products?", 'modeltheme'),
             "param_name" => "all_products",
             "std" => 'true',
             "value" => array(
              'Yes'     => '',
              'No, only auctions'        => 'auction'
             ),
            ),
            array(
              "group" => "Options",
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Search placeholder", 'modeltheme' ),
              "param_name" => "search_placeholder",
              "value" => "",
              "description" => esc_attr__( "Set the search placeholder.(e.g 'Search Products')", 'modeltheme' )
            ),
            array(
              "group" => "Filters",
              "type" => "dropdown",
              "holder" => "div",
              "heading" => esc_attr__( "Enable or disable search on filter sidebar", 'modeltheme' ),
              "param_name" => "searchfilter",
              "value" => $search_filter,
            ),
            array(
              "group" => "Filters",
              "type" => "dropdown",
              "holder" => "div",
              "heading" => esc_attr__( "Enable or disable categories on filter sidebar", 'modeltheme' ),
              "param_name" => "categoriesfilter",
              "value" => $categories_filter,
            ),
            array(
              "group" => "Filters",
              "type" => "dropdown",
              "holder" => "div",
              "heading" => esc_attr__( "Enable or disable tags on filter sidebar", 'modeltheme' ),
              "param_name" => "tagsfilter",
              "value" => $tags_filter,
            ),
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation", 'modeltheme'),
              "param_name" => "animation",
              "std" => 'fadeInLeft',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $animations_list
            )
          )
        ));



        $product_categories = array();
        if ( class_exists( 'WooCommerce' ) ) {

          $product_categories_tax = get_terms( 'product_cat', array(
            'parent'      => '0'
          ));
          if ($product_categories_tax) {
            foreach ( $product_categories_tax as $term ) {
               $product_categories[$term->name] = $term->slug;
            }
          }
        }

        // iBid - Products List
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Products List", 'modeltheme'),
           "base" => "shop-categories-with-thumbnails",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/Products-List.svg', __FILE__ ),
           "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_categories
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of categories to show", 'modeltheme'),
                 "param_name" => "number"
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show for each category", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Show categories without products?", 'modeltheme'),
                 "param_name" => "hide_empty",
                 "std" => 'true',
                 "value" => array(
                  'Yes'     => 'true',
                  'No'        => 'false'
                 ),
              )
           )
        ));

          
        // iBid - Domains List View
        vc_map(
          array(
          "name" => esc_attr__("iBid - Domains List View", 'modeltheme'),
          "base" => "domain-categories",
          "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/domains-list.svg', __FILE__ ),
          "params" => array(
            array(
              "group" => "Settings",
              "type" => "dropdown",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Select Domain Category", 'modeltheme'),
              "param_name" => "category",
              "description" => esc_attr__("Please select blog category", 'modeltheme'),
              "std" => 'Default value',
              "value" => $product_categories
            ),
            array(
               "group" => "Settings",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Number of items to show", 'modeltheme'),
               "param_name" => "number"
            ),
            array(
              "group" => "Settings",
              "type" => "dropdown",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Items Per Row", 'modeltheme'),
              "param_name" => "items_per_row",
              "std" => '',
              "description" => "",
              "value" => array(
                  esc_attr__('1 Items/Row', 'modeltheme')         => 'col-md-12',
                  esc_attr__('2 Items/Row', 'modeltheme')         => 'col-md-6',
              )
            )
         )
        ));

        vc_map(
          array(
          "name" => esc_attr__("iBid - Projects List Type", 'modeltheme'),
          "base" => "projects-list",
          "category" => esc_attr__('iBid', 'modeltheme'),
          "icon" => plugins_url( 'images/projects-list.svg', __FILE__ ),
          "params" => array(
            array(
               "group" => "Settings",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Number of items to show", 'modeltheme'),
               "param_name" => "number"
            ),
            array(
               "group" => "Settings",
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Custom Button Text", 'modeltheme'),
               "param_name" => "button_text"
            ),
            array(
              "group" => "Settings",
              "type" => "dropdown",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Items Per Row", 'modeltheme'),
              "param_name" => "items_per_row",
              "std" => '',
              "description" => "",
              "value" => array(
                  esc_attr__('1 Items/Row', 'modeltheme')         => 'col-md-12',
                  esc_attr__('2 Items/Row', 'modeltheme')         => 'col-md-6',
              )
            )
         )
        ));
        
        // iBid - Products Grid
        vc_map( 
          array(
            "name" => esc_attr__("iBid - Products Table (Products Grid)", 'modeltheme'),
            "base" => "shop-categories-with-grids",
            "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/pricing-table.svg', __FILE__ ),
            "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show", 'modeltheme'),
                 "param_name" => "number"
              ),
              array(
                 "group" => "Columns",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Column: Products Image - width", 'modeltheme'),
                 "param_name" => "product_image_width",
                 "value" => array(
                  'Fullwidth of the cell'        => 'fullwidth',
                  'Small tile'     => 'small_tile',
                 ),
              ),
              array(
                 "group" => "Columns",
                 "type" => "checkbox",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Column: SKU (Status)", 'modeltheme'),
                 "param_name" => "column_sku",
              ),
              array(
                 "group" => "Columns",
                 "type" => "checkbox",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Column: Current Bid value/Price (Status)", 'modeltheme'),
                 "param_name" => "column_current_bid_price",
              ),
              array(
                "group" => "Columns",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Column: Current Bid value/Price (Text)", 'modeltheme'),
                "param_name" => "column_current_bid_price_label",
                "description" => __( "This text will replace the default 'Current Bid' text", "my-text-domain" ),
                "dependency" => array(
                    'element' => 'column_current_bid_price',
                    'value' => array( 'true' ),
                ),
              ),
              array(
                 "group" => "Columns",
                 "type" => "checkbox",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Column: Expires On (Status)", 'modeltheme'),
                 "param_name" => "column_expires_on",
              ),
              array(
                 "group" => "Columns",
                 "type" => "checkbox",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Column: Stock (Status)", 'modeltheme'),
                 "param_name" => "column_stock",
              ),
              array(
                 "group" => "Columns",
                 "type" => "checkbox",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Column: Place Bid (Status)", 'modeltheme'),
                 "param_name" => "column_place_bid",
              ),
              array(
                "group" => "Columns",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Column: Place Bid (Text)", 'modeltheme'),
                "param_name" => "column_place_bid_label",
                "description" => __( "This text will replace the default 'Place Bid' text.", "my-text-domain" ),
                "dependency" => array(
                    'element' => 'column_place_bid',
                    'value' => array( 'true' ),
                ),
              ),

           )
        ));


        // iBid - Expiring Soon
        vc_map( 
          array(
            "name" => esc_attr__("iBid - Expiring Soon", 'modeltheme'),
            "base" => "shop-expiring-soon",
            "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/Expiring-Soon.svg', __FILE__ ),
            "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_categories
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "std" => '1',
                 "value" => array(
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4'
                 ),
              ),
           )
        ));


        // iBid - Latest Products Boxed
        vc_map(
          array(
           "name" => esc_attr__("iBid - Latest Products Boxed", 'modeltheme'),
           "base" => "shop-products-boxed",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/Latest-Products-Boxed.svg', __FILE__ ),
           "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Layout Version", 'modeltheme'),
                 "param_name" => "layout",
                 "std" => '2',
                 "value" => array(
                  'Select Layout'         => '',
                  'Style 1'               => 'box-border',
                  'Style 2'               => 'simple',
                  'Style 3'               => 'box-shadow',
                  'Style 4'               => 'v4'
                 ),
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_categories
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "std" => '2',
                 "value" => array(
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4',
                  '6'        => '6',
                 ),
              ),
           )
        ));

        // iBid - Latest Products Boxed
        vc_map(
          array(
           "name" => esc_attr__("iBid - Latest Products Styled", 'modeltheme'),
           "base" => "shop-products-styled",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/Products-Grid.svg', __FILE__ ),
           "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_categories
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "std" => '2',
                 "value" => array(
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4'
                 ),
              ),
               array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Layout Version", 'modeltheme'),
                 "param_name" => "layout",
                 "std" => '2',
                 "value" => array(
                  'Select Layout'        => '',
                  'Horizontal & Shadow'  => 'horizontal',
                  'Vertical'            => 'vertical',
                  'Vertical Simple'     => 'simple'
                 ),
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background First Product", 'modeltheme' ),
                "param_name" => "product_1",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose background color", 'modeltheme' )
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background Second Product", 'modeltheme' ),
                "param_name" => "product_2",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose background color", 'modeltheme' )
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background Thirds Product", 'modeltheme' ),
                "param_name" => "product_3",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose background color", 'modeltheme' )
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background Fourth Product", 'modeltheme' ),
                "param_name" => "product_4",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose background color", 'modeltheme' )
              ),
           )
        ));

        // iBid - Domains List Grid
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Domains List Grid", 'modeltheme'),
           "base" => "shop-products-domains",
           "category" => esc_attr__('iBid', 'modeltheme'),
           "icon" => plugins_url( 'images/domains-list.svg', __FILE__ ),
           "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_categories
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "value" => array(
                  '2'        => 'col-md-6',
                  '3'        => 'col-md-4',
                  '4'        => 'col-md-3'
                 ),
              ),
           )
        ));


        // iBid - Products Listed Info
        vc_map(
            array(
                "name" => esc_attr__("iBid - Products Listed Info", 'modeltheme'),
                "base" => "categories-listed",
                "category" => esc_attr__('iBid', 'modeltheme'),
                "icon" => plugins_url( 'images/domains-list.svg', __FILE__ ),
                "params" => array(
                array(
                    "group" => "Settings",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Number of items to show", 'modeltheme'),
                    "param_name" => "number"
                ),
                array(
                    "group" => "Settings",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Items Per Row", 'modeltheme'),
                    "param_name" => "items_per_row",
                    "std" => '',
                    "description" => "",
                    "value" => array(
                        esc_attr__('4 Items/Row', 'modeltheme')         => 'col-md-3',
                        esc_attr__('3 Items/Row', 'modeltheme')         => 'col-md-4',
                        esc_attr__('2 Items/Row', 'modeltheme')         => 'col-md-6',
                    )
                ),
                array(
                    "group" => "Settings",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Style Variant", 'modeltheme'),
                    "param_name" => "style_type",
                    "std" => '',
                    "description" => "",
                    "value" => array(
                        esc_attr__('Default (Automobilia)', 'modeltheme')           => 'default',
                        esc_attr__('Style v2 (Government Surplus)', 'modeltheme')   => 'col-md-4'
                    )
                )
            )
        ));


        // iBid - Expired Products by Category
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Expired Products by Category", 'modeltheme'),
           "base" => "shop-expired-with-thumbnails",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/countdown.svg', __FILE__ ),
           "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_categories
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show for each category", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Show categories without products?", 'modeltheme'),
                 "param_name" => "hide_empty",
                 "std" => 'true',
                 "value" => array(
                  'Yes'     => 'true',
                  'No'        => 'false'
                 ),
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "std" => '2',
                 "value" => array(
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4'
                 ),
              ),
              array(
                "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button text", 'modeltheme'),
                 "param_name" => "button_text",
                 "description" => esc_attr__("A text to replace the 'View all items' button text", 'modeltheme'),
              ),
              array(
                "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button text", 'modeltheme'),
                 "param_name" => "products_label_text",
                 "description" => esc_attr__("A text to replace the 'Products' label", 'modeltheme'),
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background Banner Color 1", 'modeltheme' ),
                "param_name" => "overlay_color1",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose banner color", 'modeltheme' )
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background Banner Color 2", 'modeltheme' ),
                "param_name" => "overlay_color2",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose banner color", 'modeltheme' )
              ),
               array(
                  "type" => "attach_image",
                      "group" => "Styling",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Background Image (Optional)", 'modeltheme' ),
                  "description" => esc_attr__("If this option is empty, the colors from colorpickers will be applied.", 'modeltheme'),
                  "param_name" => "bg_image",
               ),
           )
        ));
        
        vc_map( array(
            "name" => esc_attr__("iBid - Listed Subcategories", 'modeltheme'),
            "base" => "ibid_listed_subcateg_short",
            "as_parent" => array('only' => 'ibid_listed_subcateg_short_item'), 
            "content_element" => true,
            "show_settings_on_create" => true,
            "icon" => plugins_url( 'images/pricing-table.svg', __FILE__ ),
            "category" => esc_attr__('iBid', 'modeltheme'),
            "is_container" => true,
            "params" => array(
                array(
                   "group" => "Options",
                   "type" => "dropdown",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of columns",'modeltheme'),
                   "param_name" => "number_columns",
                   "std" => '',
                   "value" => array(
                        '4'          => 'col-md-3',
                        '3'          => 'col-md-4'
                   )
                ),  
            ),
            "js_view" => 'VcColumnView'
        ) );
        vc_map( array(
            "name" => esc_attr__("Select Category", 'modeltheme'),
            "base" => "ibid_listed_subcateg_short_item",
            "content_element" => true,
            "as_child" => array('only' => 'ibid_listed_subcateg_short'),
            "params" => array(
                    array(
                      "group" => "Settings",
                      "type" => "dropdown",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Select Category", 'modeltheme'),
                      "param_name" => "category",
                      "description" => esc_attr__("Please select category", 'modeltheme'),
                      "std" => 'Default value',
                      "value" => $product_categories
                    ),
                    array(
                        "group" => "Settings",
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_attr__("Alternative title (optional)", 'modeltheme'),
                        "param_name" => "title",
                        "description" => esc_attr__("A text to replace the Category name", 'modeltheme'),
                    )                
            )
        ) );
        //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
        if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
            class WPBakeryShortCode_ibid_listed_subcateg_short extends WPBakeryShortCodesContainer {
            }
        }
        if ( class_exists( 'WPBakeryShortCode' ) ) {
            class WPBakeryShortCode_ibid_listed_subcateg_short_item extends WPBakeryShortCode {
            }
        }

        #31. Only Categories Boxed

        $category = array();
        $category_title = array();
        if ( class_exists( 'WooCommerce' ) ) {
          $terms = get_terms('product_cat',array('hide_empty' => 0));
          if ($terms) {
            foreach ($terms as $term) {
              $category[$term->slug] = $term->name;
            }
          }

          if ($terms) {
            foreach ($terms as $term) {
              $category_title[$term->name] = $term->slug;
            }
          }
        }

        // iBid - Products Category Image
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Products Category Image", "modeltheme"),
           "base" => "mt_ibid_category_image",
           "category" => esc_attr__('iBid', "modeltheme"),
            "icon" => plugins_url( 'images/Products-Categoy-Image.svg', __FILE__ ),
           "params" => array(
            array(
               "type" => "dropdown",
               "group" => "Options",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Select Listing Base Category Slug", "modeltheme"),
               "param_name" => "category",
               "description" => esc_attr__("Please select listing base category", "modeltheme"),
               "std" => '',
               "value" => $category
            ),
            array(
               "type" => "dropdown",
               "group" => "Options",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Select Listing Base Category Title", "modeltheme"),
               "param_name" => "category_title",
               "description" => esc_attr__("Please select listing base category", "modeltheme"),
               "std" => '',
               "value" => $category_title
            ),
            array(
                 "group" => "Options",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Layout Version", 'modeltheme'),
                 "param_name" => "layout",
                 "std" => '2',
                 "value" => array(
                  'Select Layout'        => '',
                  'Horizontal & Shadow'        => 'horizontal',
                  'Vertical'            => 'vertical'
                 ),
              ),
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation", "modeltheme"),
              "param_name" => "animation",
              "std" => 'fadeInUp',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $animations_list
            )
          )
        ));


        $product_category = array();
        if ( class_exists( 'WooCommerce' ) ) {
            $product_category_tax = get_terms(array( 
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
            ));

            if ($product_category_tax) {
                foreach ( $product_category_tax as $term ) {
                    if ($term) {
                        $product_category[$term->name] = $term->slug;
                    }
                }
            }
        }

        // iBid - Products by Category v2
        vc_map( 
          array(
           "name" => esc_attr__("iBid - Products by Category v2", 'modeltheme'),
           "base" => "shop-categories-with-xsthumbnails",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/Products-Categoy-Image.svg', __FILE__ ),
           "params" => array(
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_category
              ),
               array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products Layout", 'modeltheme'),
                 "param_name" => "products_layout",
                 "std" => '2',
                 "value" => array(
                  'Select Layout'        => '',
                  'Image Left Aline'        => 'image_left',
                  'Image on top'            => 'image_top'
                 ),
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show for each category", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Show categories without products?", 'modeltheme'),
                 "param_name" => "hide_empty",
                 "std" => 'true',
                 "value" => array(
                  'Yes'     => 'true',
                  'No'        => 'false'
                 ),
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "value" => array(
                  'Select number'        => '',
                  '1'        => '1',
                  '2'        => '2',
                  '3'        => '3',
                  '4'        => '4'
                 ),
              ),
              array(
                "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button text", 'modeltheme'),
                 "param_name" => "button_text",
                 "description" => esc_attr__("A text to replace the 'View all items' button text", 'modeltheme'),
              ),
              array(
                "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button text", 'modeltheme'),
                 "param_name" => "products_label_text",
                 "description" => esc_attr__("A text to replace the 'Products' label", 'modeltheme'),
              ),
              array(
                "group" => "Styling",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Styles", 'modeltheme'),
                 "param_name" => "styles",
                 "std" => 'rounded',
                 "value" => array(
                    'Select '        => '',
                    'Style 1'        => 'style_1',
                    'Style 2'        => 'style_2'
                   ),
              ),
              array(
                "group" => "Styling",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Button Styles", 'modeltheme'),
                 "param_name" => "button_style",
                 "std" => 'rounded',
                 "value" => array(
                    'Select Layout'        => '',
                    'Rounded'        => 'rounded',
                    'Boxed with Color'        => 'boxed'
                   ),
              ),
              array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Background Banner Color 1", 'modeltheme' ),
                "param_name" => "overlay_color1",
                "value" => "", //Default color
                "description" => esc_attr__( "Choose banner color", 'modeltheme' )
              ),
              array(
                      "group" => "Styling",
                      "type" => "colorpicker",
                      "class" => "",
                      "heading" => esc_attr__( "Background Banner Color 2", 'modeltheme' ),
                      "param_name" => "overlay_color2",
                      "value" => "", //Default color
                      "description" => esc_attr__( "Choose banner color", 'modeltheme' )
              ),
               array(
                  "type" => "attach_image",
                  "group" => "Styling",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_attr__( "Background Image (Optional)", 'modeltheme' ),
                  "description" => esc_attr__("If this option is empty, the colors from colorpickers will be applied.", 'modeltheme'),
                  "param_name" => "bg_image",
               ),
               array(
                "group" => "Styling",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Banner Position", 'modeltheme'),
                 "param_name" => "banner_pos",
                 "std" => '',
                 "value" => array(
                    'Select '        => '',
                    'Left'        => '',
                    'Right'        => 'float-right'
                   ),
              ),
           )
        ));

        vc_map( array(
           "name" => __("iBid - Tabs categories"),
           "base" => "mt_tabs_categories",
           "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/tabs.svg', __FILE__ ),
           "params" => array(
            /* CAT 1 */
            array(
                "group" => "First item",
                "type" => "attach_images",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Choose icon", 'modeltheme' ),
                "param_name" => "tabs_item_icon1",
                "value" => "",
                "description" => esc_attr__( "Choose icon for first category", 'modeltheme' )
            ),
            array(
                "group"        => "First item",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab1",
                "heading"      => esc_attr__("Title of column1", 'modeltheme'),
                "description"  => esc_attr__("Enter title of column1", 'modeltheme'),
            ),
            array(
                 "group"       => "First item",
                 "type"        => "dropdown",
                 "holder"      => "div",
                 "class"       => "",
                 "heading"     => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name"  => "tab_category_1",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std"         => 'Default value',
                 "value"       => $product_categories
            ),
            /* CAT 2 */
            array(
                "group"        => "Second item",
                "type"         => "attach_images",
                "holder"       => "div",
                "class"        => "",
                "heading"      => esc_attr__( "Choose icon", 'modeltheme' ),
                "param_name"   => "tabs_item_icon2",
                "value"        => "",
                "description"  => esc_attr__( "Choose icon for first category", 'modeltheme' )
            ),
            array(
                "group"        => "Second item",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab2",
                "heading"      => esc_attr__("Title of column2", 'modeltheme'),
                "description"  => esc_attr__("Enter title of column2", 'modeltheme'),
            ),
            array(
                 "group"       => "Second item",
                 "type"        => "dropdown",
                 "holder"      => "div",
                 "class"       => "",
                 "heading"     => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name"  => "tab_category_2",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std"         => 'Default value',
                 "value"       => $product_categories
            ),
            /* CAT 3 */
            array(
                "group"        => "Third item",
                "type"         => "attach_images",
                "holder"       => "div",
                "class"        => "",
                "heading"      => esc_attr__( "Choose icon", 'modeltheme' ),
                "param_name"   => "tabs_item_icon3",
                "value"        => "",
                "description"  => esc_attr__( "Choose icon for first category", 'modeltheme' )
            ),
            array(
                "group"        => "Third item",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab3",
                "heading"      => esc_attr__("Title of column3", 'modeltheme'),
                "description"  => esc_attr__("Enter title of column3", 'modeltheme'),
            ),
            array(
                 "group"       => "Third item",
                 "type"        => "dropdown",
                 "holder"      => "div",
                 "class"       => "",
                 "heading"     => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name"  => "tab_category_3",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std"         => 'Default value',
                 "value"       => $product_categories
            ),
            /* CAT 4 */
            array(
                "group"        => "Fourth item",
                "type"         => "attach_images",
                "holder"       => "div",
                "class"        => "",
                "heading"      => esc_attr__( "Choose icon", 'modeltheme' ),
                "param_name"   => "tabs_item_icon4",
                "value"        => "",
                "description"  => esc_attr__( "Choose Fourth for first category", 'modeltheme' )
            ),
            array(
                "group"        => "Fourth item",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab4",
                "heading"      => esc_attr__("Title of column4", 'modeltheme'),
                "description"  => esc_attr__("Enter title of column4", 'modeltheme'),
            ),
            array(
                "group"        => "Fourth item",
                "type"        => "dropdown",
                 "holder"      => "div",
                 "class"       => "",
                 "heading"     => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name"  => "tab_category_4",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std"         => 'Default value',
                 "value"       => $product_categories
            ),
            /* CAT 5 */
            array(
                "group"        => "Fifth item",
                "type"         => "attach_images",
                "holder"       => "div",
                "class"        => "",
                "heading"      => esc_attr__( "Choose icon", 'modeltheme' ),
                "param_name"   => "tabs_item_icon5",
                "value"        => "",
                "description"  => esc_attr__( "Choose icon for Fifth category", 'modeltheme' )
            ),
            array(
                "group"        => "Fifth item",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title_tab5",
                "heading"      => esc_attr__("Title of column5", 'modeltheme'),
                "description"  => esc_attr__("Enter title of column5", 'modeltheme'),
            ),
            array(
                "group"        => "Fifth item",
                "type"        => "dropdown",
                 "holder"      => "div",
                 "class"       => "",
                 "heading"     => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name"  => "tab_category_5",
                 "description" => esc_attr__("Please select blog category", 'modeltheme'),
                 "std"         => 'Default value',
                 "value"       => $product_categories
            ),
          ),
        ));
        
        // iBid - Products Slider
        
          vc_map( 
            array(
              "name" => esc_attr__("iBid - Products Slider", 'modeltheme'),
              "base" => "mt_products_slider",
              "category" => esc_attr__('iBid', 'modeltheme'),
              "icon" => plugins_url( 'images/Products-Carousel.svg', __FILE__ ),
              "params" => array(
                 array(
                      "group" => "Slider Options",
                      "type"         => "dropdown",
                      "holder"       => "div",
                      "class"        => "",
                      "param_name"   => "layout",
                      "std"          => '',
                      "heading"      => esc_attr__("Layout", 'modeltheme'),
                      "description"  => "",
                      "value"        => array(
                         esc_attr__('Select', 'modeltheme') => '',
                          esc_attr__('Top Image', 'modeltheme') => 'top',
                          esc_attr__('Vertical', 'modeltheme')    => 'vertical',
                      )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__( "Number of products", 'modeltheme' ),
                      "param_name" => "number",
                      "value" => "",
                      "description" => esc_attr__( "Enter number of products to show.", 'modeltheme' )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type" => "dropdown",
                      "holder" => "div",
                      "class" => "",
                      "param_name" => "order",
                      "std"          => '',
                      "heading" => esc_attr__( "Order options", 'modeltheme' ),
                      "description" => esc_attr__( "Order ascending or descending by date", 'modeltheme' ),
                      "value"        => array(
                         esc_attr__('Select', 'modeltheme') => '',
                          esc_attr__('Ascending', 'modeltheme') => 'asc',
                          esc_attr__('Descending', 'modeltheme') => 'desc',
                      )
                      
                  ),
                  array(
                      "group" => "Slider Options",
                      "type"         => "dropdown",
                      "holder"       => "div",
                      "class"        => "",
                      "param_name"   => "navigation",
                      "std"          => '',
                      "heading"      => esc_attr__("Navigation", 'modeltheme'),
                      "description"  => "",
                      "value"        => array(
                         esc_attr__('Select', 'modeltheme') => '',
                          esc_attr__('Disabled', 'modeltheme') => 'false',
                          esc_attr__('Enabled', 'modeltheme')    => 'true',
                      )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type"         => "dropdown",
                      "holder"       => "div",
                      "class"        => "",
                      "param_name"   => "pagination",
                      "std"          => '',
                      "heading"      => esc_attr__("Pagination", 'modeltheme'),
                      "description"  => "",
                      "value"        => array(
                         esc_attr__('Select', 'modeltheme') => '',
                          esc_attr__('Disabled', 'modeltheme') => 'false',
                          esc_attr__('Enabled', 'modeltheme')    => 'true',
                      )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type"         => "dropdown",
                      "holder"       => "div",
                      "class"        => "",
                      "param_name"   => "autoplay",
                      "std"          => '',
                      "heading"      => esc_attr__("Auto Play", 'modeltheme'),
                      "description"  => "",
                      "value"        => array(
                         esc_attr__('Select', 'modeltheme') => '',
                          esc_attr__('Disabled', 'modeltheme') => 'false',
                          esc_attr__('Enabled', 'modeltheme')    => 'true',
                      )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__( "Pagination Speed", 'modeltheme' ),
                      "param_name" => "paginationspeed",
                      "value" => "",
                      "description" => esc_attr__( "Pagination Speed(Default: 700)", 'modeltheme' )
                  ),
                  
                  array(
                      "group" => "Slider Options",
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__( "Slide Speed", 'modeltheme' ),
                      "param_name" => "slidespeed",
                      "value" => "",
                      "description" => esc_attr__( "Slide Speed(Default: 700)", 'modeltheme' )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__( "Items for Desktops", 'modeltheme' ),
                      "param_name" => "number_desktop",
                      "value" => "",
                      "description" => esc_attr__( "Default - 4", 'modeltheme' )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__( "Items for Tablets", 'modeltheme' ),
                      "param_name" => "number_tablets",
                      "value" => "",
                      "description" => esc_attr__( "Default - 2", 'modeltheme' )
                  ),
                  array(
                      "group" => "Slider Options",
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__( "Items for Mobile", 'modeltheme' ),
                      "param_name" => "number_mobile",
                      "value" => "",
                      "description" => esc_attr__( "Default - 1", 'modeltheme' )
                  ),
                  array(
                      "group" => "Animation",
                      "type" => "dropdown",
                      "heading" => esc_attr__("Animation", 'modeltheme'),
                      "param_name" => "animation",
                      "std" => '',
                      "holder" => "div",
                      "class" => "",
                      "description" => "",
                      "value" => $animations_list
                  ),
              )
          ));
        


        // iBid - Products Carousel
        vc_map( 
          array(
            "name" => esc_attr__("iBid - Products Carousel", 'modeltheme'),
            "base" => "mt-products-carousel",
            "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/Products-Carousel.svg', __FILE__ ),
            "params" => array(
                array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Select Products Category", 'modeltheme'),
                 "param_name" => "category",
                 "description" => esc_attr__("Please select WooCommerce Category", 'modeltheme'),
                 "std" => 'Default value',
                 "value" => $product_category
              ),
              array(
                 "group" => "Settings",
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Number of products to show", 'modeltheme'),
                 "param_name" => "number_of_products_by_category"
              ),
              array(
                 "group" => "Settings",
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_attr__("Products per column", 'modeltheme'),
                 "param_name" => "number_of_columns",
                 "value" => array(
                  '2'        => 'col-md-6',
                  '3'        => 'col-md-4',
                  '4'        => 'col-md-3'
                 ),
              ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Number of products", 'modeltheme' ),
                    "param_name" => "number",
                    "value" => "",
                    "description" => esc_attr__( "Enter number of products to show.", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "param_name" => "order",
                    "std"          => '',
                    "heading" => esc_attr__( "Order options", 'modeltheme' ),
                    "description" => esc_attr__( "Order ascending or descending by date", 'modeltheme' ),
                    "value"        => array(
                        esc_attr__('Select Option', 'modeltheme') => '',
                        esc_attr__('Ascending', 'modeltheme') => 'asc',
                        esc_attr__('Descending', 'modeltheme') => 'desc',
                    )
                    
                ),
                array(
                    "group" => "Slider Options",
                    "type"         => "dropdown",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "navigation",
                    "std"          => '',
                    "heading"      => esc_attr__("Navigation", 'modeltheme'),
                    "description"  => "",
                    "value"        => array(
                        esc_attr__('Select Option', 'modeltheme') => '',
                        esc_attr__('Disabled', 'modeltheme') => 'false',
                        esc_attr__('Enabled', 'modeltheme')    => 'true',
                    )
                ),
                array(
                    "group" => "Slider Options",
                    "type"         => "dropdown",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "pagination",
                    "std"          => '',
                    "heading"      => esc_attr__("Pagination", 'modeltheme'),
                    "description"  => "",
                    "value"        => array(
                        esc_attr__('Select Option', 'modeltheme') => '',
                        esc_attr__('Disabled', 'modeltheme') => 'false',
                        esc_attr__('Enabled', 'modeltheme')    => 'true',
                    )
                ),
                array(
                    "group" => "Slider Options",
                    "type"         => "dropdown",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "autoplay",
                    "std"          => '',
                    "heading"      => esc_attr__("Auto Play", 'modeltheme'),
                    "description"  => "",
                    "value"        => array(
                        esc_attr__('Select Option', 'modeltheme') => '',
                        esc_attr__('Disabled', 'modeltheme') => 'false',
                        esc_attr__('Enabled', 'modeltheme')    => 'true',
                    )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Pagination Speed", 'modeltheme' ),
                    "param_name" => "paginationSpeed",
                    "value" => "",
                    "description" => esc_attr__( "Pagination Speed(Default: 700)", 'modeltheme' )
                ),
                
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Slide Speed", 'modeltheme' ),
                    "param_name" => "slideSpeed",
                    "value" => "",
                    "description" => esc_attr__( "Slide Speed(Default: 700)", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Items for Desktops", 'modeltheme' ),
                    "param_name" => "number_desktop",
                    "value" => "",
                    "description" => esc_attr__( "Default - 4", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Items for Tablets", 'modeltheme' ),
                    "param_name" => "number_tablets",
                    "value" => "",
                    "description" => esc_attr__( "Default - 2", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Items for Mobile", 'modeltheme' ),
                    "param_name" => "number_mobile",
                    "value" => "",
                    "description" => esc_attr__( "Default - 1", 'modeltheme' )
                ),
                array(
                    "group" => "Animation",
                    "type" => "dropdown",
                    "heading" => esc_attr__("Animation", 'modeltheme'),
                    "param_name" => "animation",
                    "std" => '',
                    "holder" => "div",
                    "class" => "",
                    "description" => "",
                    "value" => $animations_list
                ),
            )
        ));


        // iBid - Members Slider
        vc_map( 
          array(
            "name" => esc_attr__("iBid - Members Slider", 'modeltheme'),
            "base" => "mt_members_slider",
            "category" => esc_attr__('iBid', 'modeltheme'),
            "icon" => plugins_url( 'images/members-slider.svg', __FILE__ ),
            "params" => array(
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Number of members", 'modeltheme' ),
                    "param_name" => "number",
                    "value" => "",
                    "description" => esc_attr__( "Enter number of members to show.", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "param_name" => "order",
                    "std"          => '',
                    "heading" => esc_attr__( "Order options", 'modeltheme' ),
                    "description" => esc_attr__( "Order ascending or descending by date", 'modeltheme' ),
                    "value"        => array(
                        esc_attr__('Ascending', 'modeltheme') => 'asc',
                        esc_attr__('Descending', 'modeltheme') => 'desc',
                    )
                    
                ),
                array(
                    "group" => "Slider Options",
                    "type"         => "dropdown",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "navigation",
                    "std"          => '',
                    "heading"      => esc_attr__("Navigation", 'modeltheme'),
                    "description"  => "",
                    "value"        => array(
                        esc_attr__('Disabled', 'modeltheme') => 'false',
                        esc_attr__('Enabled', 'modeltheme')    => 'true',
                    )
                ),
                array(
                    "group" => "Slider Options",
                    "type"         => "dropdown",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "pagination",
                    "std"          => '',
                    "heading"      => esc_attr__("Pagination", 'modeltheme'),
                    "description"  => "",
                    "value"        => array(
                        esc_attr__('Disabled', 'modeltheme') => 'false',
                        esc_attr__('Enabled', 'modeltheme')    => 'true',
                    )
                ),
                array(
                    "group" => "Slider Options",
                    "type"         => "dropdown",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "autoPlay",
                    "std"          => '',
                    "heading"      => esc_attr__("Auto Play", 'modeltheme'),
                    "description"  => "",
                    "value"        => array(
                        esc_attr__('Disabled', 'modeltheme') => 'false',
                        esc_attr__('Enabled', 'modeltheme')    => 'true',
                    )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Pagination Speed", 'modeltheme' ),
                    "param_name" => "paginationSpeed",
                    "value" => "",
                    "description" => esc_attr__( "Pagination Speed(Default: 700)", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Button Text", 'modeltheme' ),
                    "param_name" => "button_text",
                    "value" => "",
                    "description" => esc_attr__( "Enter button text", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Button Link", 'modeltheme' ),
                    "param_name" => "button_link",
                    "value" => "",
                    "description" => esc_attr__( "Enter button link", 'modeltheme' )
                ),
                array(
                      "group" => "Styling",
                      "type" => "colorpicker",
                      "class" => "",
                      "heading" => esc_attr__( "Button Background Color", 'modeltheme' ),
                      "param_name" => "button_background",
                      "value" => "", //Default color
                      "description" => esc_attr__( "Choose button color", 'modeltheme' )
                    ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Slide Speed", 'modeltheme' ),
                    "param_name" => "slideSpeed",
                    "value" => "",
                    "description" => esc_attr__( "Slide Speed(Default: 700)", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Items for Desktops", 'modeltheme' ),
                    "param_name" => "number_desktop",
                    "value" => "",
                    "description" => esc_attr__( "Default - 4", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Items for Tablets", 'modeltheme' ),
                    "param_name" => "number_tablets",
                    "value" => "",
                    "description" => esc_attr__( "Default - 2", 'modeltheme' )
                ),
                array(
                    "group" => "Slider Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Items for Mobile", 'modeltheme' ),
                    "param_name" => "number_mobile",
                    "value" => "",
                    "description" => esc_attr__( "Default - 1", 'modeltheme' )
                ),
                array(
                    "group" => "Animation",
                    "type" => "dropdown",
                    "heading" => esc_attr__("Animation", 'modeltheme'),
                    "param_name" => "animation",
                    "std" => '',
                    "holder" => "div",
                    "class" => "",
                    "description" => "",
                    "value" => $animations_list
                ),
            )
        )); 

      }
    }

   // iBid - CountDown Version 2
  vc_map( 
    array(
     "name" => esc_attr__("iBid - Countdown Version 2", 'modeltheme'),
     "base" => "shortcode_countdown_v2",
     "category" => esc_attr__('iBid', 'modeltheme'),
     "icon" => plugins_url( 'images/countdown.svg', __FILE__ ),
     "params" => array(
        array(
          "type" => "textfield",
          "heading" => __("Extra class name", "modeltheme"),
          "param_name" => "el_class",
          "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Date", 'modeltheme'),
           "param_name" => "insert_date",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => "Insert date. Format:YYYY-MM-DD"
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
    )
  );

  // iBid - Featured Product
  vc_map( 
    array(
      "name" => esc_attr__("iBid - Featured Auction", 'modeltheme'),
      "base" => "featured_product",
      "category" => esc_attr__('iBid', 'modeltheme'),
      "icon" => plugins_url( 'images/Products-Auctions.svg', __FILE__ ),
      "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Write Product ID", 'modeltheme' ),
          "param_name" => "select_product",
          "value" => "",
          "description" => esc_attr__( "Enter product ID", 'modeltheme' )
        ),
         array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Write Subtitle Product", 'modeltheme' ),
          "param_name" => "subtitle_product",
          "value" => "",
          "description" => esc_attr__( "Enter Subtitle Product", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Featured product background color", 'modeltheme' ),
          "param_name" => "background_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the background color", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product category color", 'modeltheme' ),
          "param_name" => "category_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for categories", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product name color", 'modeltheme' ),
          "param_name" => "product_name_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for product name", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product price color", 'modeltheme' ),
          "param_name" => "price_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for price", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Button text", 'modeltheme' ),
          "param_name" => "button_text",
          "value" => "",
          "description" => esc_attr__( "Enter button text", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button gradient color - 1", 'modeltheme' ),
          "param_name" => "button_background_color1",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the gradient color -1 for the button", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button gradient color - 2", 'modeltheme' ),
          "param_name" => "button_background_color2",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the gradient color -2 for the button", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button text color ", 'modeltheme' ),
          "param_name" => "button_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the text color for the button", 'modeltheme' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));

// iBid - Featured Product
  vc_map( 
    array(
      "name" => esc_attr__("iBid - Featured Simple Product", 'modeltheme'),
      "base" => "featured_simple_product",
      "category" => esc_attr__('iBid', 'modeltheme'),
     "icon" => plugins_url( 'images/Featured-Product.svg', __FILE__ ),
      "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Write Product ID", 'modeltheme' ),
          "param_name" => "select_product",
          "value" => "",
          "description" => esc_attr__( "Enter product ID", 'modeltheme' )
        ),
         array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Write Subtitle Product", 'modeltheme' ),
          "param_name" => "subtitle_product",
          "value" => "",
          "description" => esc_attr__( "Enter Subtitle Product", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Featured product background color", 'modeltheme' ),
          "param_name" => "background_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the background color", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product category color", 'modeltheme' ),
          "param_name" => "category_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for categories", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product name color", 'modeltheme' ),
          "param_name" => "product_name_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for product name", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product price color", 'modeltheme' ),
          "param_name" => "price_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for price", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Button text", 'modeltheme' ),
          "param_name" => "button_text",
          "value" => "",
          "description" => esc_attr__( "Enter button text", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button gradient color - 1", 'modeltheme' ),
          "param_name" => "button_background_color1",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the gradient color -1 for the button", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button gradient color - 2", 'modeltheme' ),
          "param_name" => "button_background_color2",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the gradient color -2 for the button", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button text color ", 'modeltheme' ),
          "param_name" => "button_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the text color for the button", 'modeltheme' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));

  //"iBid - Featured Product - no image
  vc_map( 
    array(
     "name" => esc_attr__("iBid - Featured Auction - no image", 'modeltheme'),
     "base" => "featured_product_no_image",
     "category" => esc_attr__('iBid', 'modeltheme'),
     "icon" => plugins_url( 'images/Products-Auctions.svg', __FILE__ ),
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Write Product ID", 'modeltheme' ),
          "param_name" => "select_product",
          "value" => "",
          "description" => esc_attr__( "Enter product ID", 'modeltheme' )
        ),
         array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Write Subtitle Product", 'modeltheme' ),
          "param_name" => "subtitle_product",
          "value" => "",
          "description" => esc_attr__( "Enter Subtitle Product", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Featured product background color", 'modeltheme' ),
          "param_name" => "background_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the background color", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product category color", 'modeltheme' ),
          "param_name" => "category_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for categories", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product name color", 'modeltheme' ),
          "param_name" => "product_name_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for product name", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Product price color", 'modeltheme' ),
          "param_name" => "price_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the color for price", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Button text", 'modeltheme' ),
          "param_name" => "button_text",
          "value" => "",
          "description" => esc_attr__( "Enter button text", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button gradient color - 1", 'modeltheme' ),
          "param_name" => "button_background_color1",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the gradient color -1 for the button", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button gradient color - 2", 'modeltheme' ),
          "param_name" => "button_background_color2",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the gradient color -2 for the button", 'modeltheme' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Button text color ", 'modeltheme' ),
          "param_name" => "button_text_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Pick the text color for the button", 'modeltheme' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
  

  // iBid - Typed Text
  vc_map( 
    array(
      "name" => esc_attr__("iBid - Typed Text", 'modeltheme'),
      "base" => "mt_typed_text",
      "category" => esc_attr__('iBid', 'modeltheme'),
      "icon" => plugins_url( 'images/Typed-Text.svg', __FILE__ ),
      "params" => array(
        array(
           "group" => "Options",
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Texts", 'modeltheme'),
           "param_name" => "texts",
           "value" => "",
           "description" => "Eg: 'String Text 1', 'String Text 2', 'String Text 3'"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Font Size", 'modeltheme'),
           "param_name" => "font_size",
           "value" => "",
           "description" => "Eg: 60px"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Before text", 'modeltheme'),
           "param_name" => "beforetext",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("After text", 'modeltheme'),
           "param_name" => "aftertext",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Type Speed", 'modeltheme'),
           "param_name" => "typespeed",
           "value" => "0",
           "description" => "Default: 0"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Time Before Backspacing", 'modeltheme'),
           "param_name" => "backdelay",
           "value" => "500",
           "description" => "Default: 500 (Which is 0.5s)"
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
         ), 
     )
  ));

  #MT Video
  vc_map( 
    array(
      "name" => esc_attr__("iBid - Video", 'modeltheme'),
      "base" => "shortcode_video",
      "category" => esc_attr__('iBid', 'modeltheme'),
      "icon" => plugins_url( 'images/video-popup.svg', __FILE__ ),
      "params" => array(
        array(
          "group" => "Options",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "button_image",
          "value" => "",
          "description" => esc_attr__( "Choose image for play button", 'modeltheme' )
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Video source"),
           "param_name" => "video_source",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            'Youtube'   => 'source_youtube',
            'Vimeo'     => 'source_vimeo',
            )
        ),
        array(
           "group" => "Options",
           "dependency" => array(
           'element' => 'video_source',
           'value' => array( 'source_vimeo' ),
           ),
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Vimeo id link", 'modeltheme'),
           "param_name" => "vimeo_link_id",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "dependency" => array(
           'element' => 'video_source',
           'value' => array( 'source_youtube' ),
           ),
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Youtube id link", 'modeltheme'),
           "param_name" => "youtube_link_id",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
        )));


  # MT Search Form
  vc_map( 
    array(
     "name" => __("iBid - Products and Auctions Search", 'modeltheme'),
     "base" => "mt_ico_search",
     "category" => esc_attr__('iBid', 'modeltheme'),
    "icon" => plugins_url( 'images/Search-Auctions.svg', __FILE__ ),
     "params" => array(
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("With type", "modeltheme"),
           "param_name" => "width_type",
           "std" => '',
           "description" => esc_attr__("Please choose the with type", "modeltheme"),
           "value" => array(
            esc_attr__('Boxed', 'modeltheme')          => '',
            esc_attr__('Full width', 'modeltheme')     => 'full_with_row',
           )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Style Variant", 'modeltheme'),
          "param_name" => "mtsearchform_style_variant",
          "std" => '',
          "description" => "",
          "value" => array(
              esc_attr__('Style 1', 'modeltheme')         => '',
              esc_attr__('Style 2', 'modeltheme')         => 'mtsearchform-style-v2',
          )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Popular Searches", 'modeltheme'),
          "param_name" => "popular_searches",
          "std" => '',
          "description" => "",
          "value" => array(
              esc_attr__('On / Show', 'modeltheme')         => 'on',
              esc_attr__('Off / Hide', 'modeltheme')         => 'off',
          )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "heading" => __("Extra class name", "modeltheme"),
          "param_name" => "extra_class",
          "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));

  # MT Multi Categ Search Form
  vc_map( 
    array(
     "name" => __("iBid -Multicategory Search", 'modeltheme'),
     "base" => "multi_categ_search",
     "category" => esc_attr__('iBid', 'modeltheme'),
    "icon" => plugins_url( 'images/Search-Auctions.svg', __FILE__ ),
     "params" => array(
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("With type", "modeltheme"),
           "param_name" => "width_type",
           "std" => '',
           "description" => esc_attr__("Please choose the with type", "modeltheme"),
           "value" => array(
            esc_attr__('Boxed', 'modeltheme')          => '',
            esc_attr__('Full width', 'modeltheme')     => 'full_with_row',
           )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "heading" => __("Extra class name", "modeltheme"),
          "param_name" => "extra_class",
          "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
        )
      )
  ));

  # MT Map Pins
  vc_map( 
    array(
        "name" => esc_attr__("iBid - Map Pins", 'modeltheme'),
        "base" => "mt_map_pins",
        "as_parent" => array('only' => 'mt_map_pins_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "show_settings_on_create" => true,
        "icon" => plugins_url( 'images/Map-Pins.svg', __FILE__ ),
        "category" => esc_attr__('iBid', 'modeltheme'),
        "is_container" => true,
        "params" => array(
            array(
                "type"          => "attach_image",
                "heading"       => esc_attr__( "Background", 'modeltheme' ),
                "param_name"    => "item_image_map",
                "description"   => ""
            ),

            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "modeltheme"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
            ),
            array(
              "group" => "Animation",
              "type" => "dropdown",
              "heading" => esc_attr__("Animation", 'modeltheme'),
              "param_name" => "animation",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $animations_list
          ), 

        ),
        "js_view" => 'VcColumnView'
    )
  );

  // Map Single Point
  vc_map( 
    array(
      "name" => esc_attr__("Map Single Point", 'modeltheme'),
      "base" => "mt_map_pins_item",
      "content_element" => true,
      "as_child" => array('only' => 'mt_map_pins'), // Use only|except attributes to limit parent (separate multiple values with comma)
      "params" => array(
          // add params same as with any other content element
          array(
              "group"        => "General Options",
              "type"         => "textfield",
              "holder"       => "div",
              "class"        => "",
              "param_name"   => "item_title",
              "heading"      => esc_attr__("Title", 'modeltheme'),
              "description"  => esc_attr__("Enter title for current menu item(Eg: Italian Pizza)", 'modeltheme'),
          ),
          array(
              "group"        => "General Options",
              "type"         => "textarea",
              "holder"       => "div",
              "class"        => "",
              "param_name"   => "item_content",
              "heading"      => esc_attr__("Description", 'modeltheme'),
              "description"  => esc_attr__("Enter title for current menu item(Eg: 30x30cm with cheese, onion rings, olives and tomatoes)", 'modeltheme'),
          ),
          array(
              "group"         => "General Options",
              "type"          => "attach_image",
              "holder"        => "div",
              "class"         => "",
              "heading"       => esc_attr__( "Thumbnail", 'modeltheme' ),
              "param_name"    => "item_image",
              "description"   => ""
          ),
          array(
              "group"        => "General Options",
              "type"         => "textfield",
              "holder"       => "div",
              "class"        => "",
              "param_name"   => "coordinates_x",
              "heading"      => esc_attr__("Coordinates on x axis", 'modeltheme'),
              "description"  => esc_attr__("Enter coordinates on x axis in percentange", 'modeltheme'),
          ),
          array(
              "group"        => "General Options",
              "type"         => "textfield",
              "holder"       => "div",
              "class"        => "",
              "param_name"   => "coordinates_y",
              "heading"      => esc_attr__("Coordinates on y axis", 'modeltheme'),
              "description"  => esc_attr__("Enter coordinates on y axis in percentange", 'modeltheme'),
          ),
          array(
              "group" => "Extra Options",
              "type" => "textfield",
              "heading" => __("Extra class name", "modeltheme"),
              "param_name" => "el_class_pin",
              "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
          )
      )
  ) );


  //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_Mt_map_pins extends WPBakeryShortCodesContainer {
      }
  }
  if ( class_exists( 'WPBakeryShortCode' ) ) {
      class WPBakeryShortCode_Mt_map_pins_Item extends WPBakeryShortCode {
      }
  }

  // iBid - Causes Grid
  vc_map( 
    array(
       "name" => esc_attr__("iBid - Causes Grid", 'modeltheme'),
       "base" => "ibid-cause-posts",
       "category" => esc_attr__('iBid', 'modeltheme'),
       "icon" => plugins_url( 'images/Causes-Grid.svg', __FILE__ ),
       "params" => array(
         array(
            "group" => "Settings",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number", 'modeltheme' ),
            "param_name" => "number",
            "value" => esc_attr__( "3", "ibid" )
         ),
        array(
           "group" => "Settings",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns", 'modeltheme'),
           "param_name" => "columns",
           "value" => array(
            '2 columns'     => 'vc_col-md-6',
            '3 columns'     => 'vc_col-md-4',
            '4 columns'     => 'vc_col-md-3'
           )
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Choose overlay color", 'modeltheme'),
            "param_name" => "overlay_color"
         ),
         array(
            "group" => "Styling",
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Choose text color", 'modeltheme'),
            "param_name" => "text_color"
         )
     )
  ));


    // Shortcode : Service Tables (With Switcher)
    vc_map( array(
        "name" => esc_attr__("Service Tables (With Switcher)", 'modeltheme'),
        "base" => "ibid_services_switcher_short",
        "as_parent" => array('only' => 'ibid_services_switcher_short_item'), 
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => plugins_url( 'images/pricing-table.svg', __FILE__ ),
        "category" => esc_attr__('iBid', 'modeltheme'),
        "is_container" => true,
        "params" => array(
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Switch status"),
                "param_name" => "switch_status",
                "std" => '',
                "description" => esc_attr__(""),
                "value" => array(
                    'Enable'           => 'on',
                    'Disable'          => 'off'
                )
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Switcher Label 1", 'modeltheme'),
                "param_name" => "switcher_label_1",
                "std" => '',     
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Switcher Label 2", 'modeltheme'),
                "param_name" => "switcher_label_2",
                "std" => '',     
            ),    
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Service Table List Item", 'modeltheme'),
        "base" => "ibid_services_switcher_short_item",
        "icon" => plugins_url( 'images/pricing-table.svg', __FILE__ ),
        "content_element" => true,
        "as_child" => array('only' => 'ibid_services_switcher_short'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            array(
               "group" => "Options",
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Number of columns"),
               "param_name" => "number_columns",
               "std" => '',
               "description" => esc_attr__(""),
               "value" => array(
                    '2'          => 'col-md-6',
                    '3'          => 'col-md-4',
                    '4'          => 'col-md-3'
                )
            ),  
            array(
                "group" => "Box Setup",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Service title", 'modeltheme'),
                "param_name" => "package_title",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Box Setup",
                "type" => "attach_images",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "First Icon Service", 'modeltheme' ),
                "param_name" => "first_icon_package",
                "value" => "",
                "description" => esc_attr__( "Choose icon for first package", 'modeltheme' )
            ),
            array(
                "group" => "Box Setup",
                "type" => "attach_images",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Second Icon Service", 'modeltheme' ),
                "param_name" => "second_icon_package",
                "value" => "",
                "description" => esc_attr__( "Choose icon for second package", 'modeltheme' )
            ),
            array(
                "group" => "Box Setup",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Service Link", 'modeltheme'),
                "param_name" => "button_url",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Animation",
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => '',
                "holder" => "div",
                "class" => "",
                "description" => ""
            )
        )
    ) );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_ibid_services_switcher_short extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_ibid_services_switcher_short_item extends WPBakeryShortCode {
        }
    }

    
    