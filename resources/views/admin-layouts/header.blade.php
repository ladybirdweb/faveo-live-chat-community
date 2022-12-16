<div class="customer-chat-header">
    <div class="customer-chat-header-title">
        <img style="width: 80px; height: auto;" src="{{ asset('img/faveo.png') }}" />
        {{__('lang.Faveo_Chat')}}
    </div>
    <div id="customer-chat-button-menu" class="customer-chat-header-button">
        <div class="customer-chat-content-message-avatar-operator"></div>
        <div class="customer-chat-header-button-text"></div>
        <i class="icon-chevron-down icon-white"></i>
    </div>
    <div class="status-switch">
        <span class="online"><i class="icon fa fa-circle"></i> {{__('lang.Online')}} </span>
        <span class="offline"><i class="icon fa fa-circle"></i> {{__('lang.Offline')}}</span>
    </div>

    <div class="customer-chat-header-menu">
        <div class="customer-chat-header-menu-triangle"></div>

        <a href="#" id="customer-chat-header-menu-edit" class="customer-chat-header-menu-item" data-id="0"><i class="icon-user"></i> <div> {{__('lang.Edit_Profile')}} </div></a>
        {{--            <a href="" id="customer-chat-header-menu-install" class="customer-chat-header-menu-item"><i class="icon-chevron-right"></i> <div> <?php echo $app->trans('install') ?> </div></a>--}}
        {{--            <?php if($vars["installed"]) { ?>--}}
        {{--            <a href="#" id="customer-chat-header-menu-edit-config" class="customer-chat-header-menu-item"><i class="icon-chevron-right"></i> <div><?php echo $app->trans('edit.config') ?></div></a>--}}
        {{--            <?php } ?>--}}
        <a href="logout" class="customer-chat-header-menu-item"><i class="icon-off"></i> <div> {{__('lang.Logout')}} </div></a>
    </div>
</div>