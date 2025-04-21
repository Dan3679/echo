<?php
$level = in_array($atts['level'], ['h1','h2','h3','h4','h5','h6']) ? $atts['level'] : 'h2';
?>

<section class="headline-section <?= esc_attr($atts['align']) ?>">
    <?php if (!empty($atts['above_headline'])): ?>
        <div class="above-headline"><?= esc_html($atts['above_headline']) ?></div>
    <?php endif; ?>

    <<?= $level ?> class="headline"><?= esc_html($atts['headline']) ?></<?= $level ?>>

    <?php if (!empty($atts['below_headline'])): ?>
        <div class="below-headline"><?= esc_html($atts['below_headline']) ?></div>
    <?php endif; ?>

    <?php if (!empty($atts['paragraph'])): ?>
        <div class="headline-paragraph">
            <?= wp_kses_post($atts['paragraph']) ?>
        </div>
    <?php endif; ?>
</section>