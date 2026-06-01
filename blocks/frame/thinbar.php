<?php require_once( '../../comm_admin/cms.php' ); ?>
<cms:template title='Stock Inventory:: Top Extra Naviation' parent='_frame_' icon='cog' clonable='0'  order='100' >
    <cms:mosaic name='site_thnbar_msc' label='Thin Information Bar' body_class='_pb'>
        <cms:tile name='thnbr_ctct_tl' label='Contact Info Only' _pb_template='pg_frame/thinbar/theme/thnbr_ctct' _pb_height='70'>
            <cms:embed 'pb_mods/pg_frame/thinbar/embed/thnbr_ctct.htm' />
        </cms:tile>
        <cms:tile name='thnbr_scal_tl' label='Social Links' _pb_template='pg_frame/thinbar/theme/thnbr_scal' _pb_height='70'>
            <cms:embed 'pb_mods/pg_frame/thinbar/embed/thnbr_scal.htm' />
        </cms:tile>
        <cms:tile name='thnbr_menu_tl' label='Contact and Menu Items' _pb_template='pg_frame/thinbar/theme/thnbr_menu' _pb_height='70'>
            <cms:embed 'pb_mods/pg_frame/thinbar/embed/thnbr_menu.htm' />
        </cms:tile>
        <cms:tile name='thnbr_shop_tl' label='Shop Bar with Cart' _pb_template='pg_frame/thinbar/theme/thnbr_shop' _pb_height='70'>
            <cms:embed 'pb_mods/pg_frame/thinbar/embed/thnbr_shop.htm' />
        </cms:tile>
        <cms:tile name='thnbr_sntnc_tl' label='Text Phrase' _pb_template='pg_frame/thinbar/theme/thnbr_sentnc' _pb_height='70'>
            <cms:embed 'pb_mods/pg_frame/thinbar/embed/thnbr_sentnc.htm' />
        </cms:tile>
        <cms:tile name='thnbr_dates_tl' label='Dates Pickers' _pb_template='pg_frame/thinbar/theme/dates' _pb_height='70'>
            <cms:embed 'pb_mods/pg_frame/thinbar/embed/dates.htm' />
        </cms:tile>
    </cms:mosaic>
</cms:template>
<?php COUCH::invoke(); ?>