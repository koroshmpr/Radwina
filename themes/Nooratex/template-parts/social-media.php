<ul class="d-flex list-unstyled gap-2 m-0 mb-2 align-items-center justify-content-lg-start justify-content-center py-2">
    <?php
    $socialPlatforms = [
        'whatsapp' => 'whatsapp',
        'telegram' => 'telegram',
        'aparat' => 'aparat',
        'instagram' => 'instagram',
        'eitaa' => 'eitaa',
    ];

    foreach ($socialPlatforms as $platform => $icon) {
        $fieldValue = get_field($platform, 'option');

        if ($fieldValue) {
            echo '<li><a aria-label="'. $icon  .'" class="bg-primary rounded-circle fs-3 px-2 py-0" href="' . esc_url($fieldValue) . '">';
            get_template_part('template-parts/svg/social/' . $icon, null, $args);
            echo '</a></li>';
        }
    }
    ?>
</ul>
