<?php
/**
 * Navigation template.
 *
 * @package Echo
 */

$locations = get_nav_menu_locations();
$menu_id = $locations['primary'] ?? null;

$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];

function get_child_menu_items($menu_items, $parent_id) {
    $children = [];
    foreach ($menu_items as $item) {
        if ((int)$item->menu_item_parent === (int)$parent_id) {
            $children[] = $item;
        }
    }
    return $children;
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
    <div class="container">
        <?php if (function_exists('the_custom_logo')) {
            the_custom_logo();
        } ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'echo'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if (!empty($menu_items)) : ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($menu_items as $menu_item) :
                        if (!$menu_item->menu_item_parent) :
                            $child_items = get_child_menu_items($menu_items, $menu_item->ID);
                            $has_children = !empty($child_items);
                            $target = $menu_item->target ?: '_self';
                            ?>
                            <?php if (!$has_children) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>" target="<?php echo esc_attr($target); ?>">
                                    <?php echo esc_html($menu_item->title); ?>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>"
                                   id="navbarDropdown-<?php echo esc_attr($menu_item->ID); ?>" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false" target="<?php echo esc_attr($target); ?>">
                                    <?php echo esc_html($menu_item->title); ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown-<?php echo esc_attr($menu_item->ID); ?>">
                                    <?php foreach ($child_items as $child) : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo esc_url($child->url); ?>"
                                               target="<?php echo esc_attr($child->target ?: '_self'); ?>">
                                                <?php echo esc_html($child->title); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php endif;
                    endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php get_search_form(); ?>
        </div>
    </div>
</nav>
