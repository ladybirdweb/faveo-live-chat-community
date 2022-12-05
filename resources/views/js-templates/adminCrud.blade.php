
<script type="text/x-handlebars-template" id="operatorItem">
    <div class="customer-chat-content-row">
        <div class="customer-chat-label">
            {{--            <i class="avatar customer-chat-content-message-avatar-operator"{{#if image}} style="background-image: url({{image}});"{{/if}}></i> <span class="customer-chat-operator-name">{{name}}</span>--}}
        </div>
        {{--        <div class="customer-chat-label customer-chat-operator-mail">{{mail}}</div>--}}
        <div class="customer-chat-tab-content-operators-actions">
            {{--            <a class="customer-chat-operators-edit" href="#" data-id="{{id}}"><i class="icon-edit"></i></a>--}}
            {{--            {{#if removeVisible}}<a class="customer-chat-operators-remove" href="#" data-id={{id}}><i class="icon-remove"></i></a>{{/if}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="departmentItem">
    <div class="customer-chat-content-row">
        <div class="customer-chat-label">
            {{--            <span class="customer-chat-department-name">{{name}}</span>--}}
        </div>
        {{--        <div class="customer-chat-label customer-chat-department-description">{{description}}</div>--}}
        <div class="customer-chat-tab-content-departments-actions">
            {{--            <a class="customer-chat-departments-edit" href="#" data-id="{{id}}"><i class="icon-edit"></i></a>--}}
            {{--            <a class="customer-chat-departments-remove" href="#" data-id="{{id}}"><i class="icon-remove"></i></a>--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="cannedMessageItem">
    <div class="customer-chat-content-row">
        <div class="customer-chat-label">
            {{--            <span class="customer-chat-canned-message-name">{{name}}</span>--}}
        </div>
        {{--        <div class="customer-chat-label customer-chat-canned-message-body">{{body}}</div>--}}
        <div class="customer-chat-tab-content-canned-messages-actions">
            {{--            <a class="customer-chat-canned-messages-edit" href="#" data-id="{{id}}"><i class="icon-edit"></i></a>--}}
            {{--            <a class="customer-chat-canned-messages-remove" href="#" data-id="{{id}}"><i class="icon-remove"></i></a>--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="installDialogContent">
    <p>Confirm to install the application</p>
</script>

<script type="text/x-handlebars-template" id="invalidInstallDialogContent">
    <p> {{__('lang.Invalid_Installation')}} </p>
</script>

<script type="text/x-handlebars-template" id="confirmDialog" title="Remove the user?">
    <p> {{__('lang.Delete_User')}} </p>
</script>

<script type="text/x-handlebars-template" id="formErrorDialog">
    <div id="dialog-form-error" title="Form error"></div>
</script>

<script type="text/x-handlebars-template" id="widgetCodeContent">
    <div class="widget-code">
        <div class="customer-chat-tabs">
            <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>
            <div class="customer-chat-tabs-wrapper">
                <a href="#" class="customer-chat-tab customer-chat-tab-button customer-chat-active"> {{__('lang.Bottom_Right')}} </a>
                <a href="#" class="customer-chat-tab customer-chat-tab-button"> {{__('lang.Inline')}} </a>
            </div>
            <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
        </div>
        <div class="customer-chat-tab-content">
            <div class="code-wrapper">
                {{--                <code>&lt;script&gt;(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','{{src}}');&lt;/script&gt;</code>--}}
            </div>
        </div>
        <div class="customer-chat-tab-content">
            <div class="code-wrapper">
                {{--                <code>&lt;script id="__init-script-inline-widget__"&gt;(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','{{srcInline}}');&lt;/script&gt;</code>--}}
            </div>
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="selectAvatarContent">
    <div class="avatars-wrapper">
        <div class="avatars">
            {{--            {{#each urls}}--}}
            {{--            <i class="customer-chat-content-message-avatar" style="background-image: url({{this}});" data-image="{{this}}"></i>--}}
            {{--            {{/each}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="selectCannedMessageContent">
    <div class="canned-messages-wrapper">
        <div class="messages">
            {{--            {{#each messages}}--}}
            {{--            <a class="customer-chat-content-canned-message" data-message="{{body}}">--}}
            {{--                <b>{{displayName name}}</b> (<i>{{displayBody body}}</i>)--}}
            {{--            </a>--}}
            {{--            {{else}}--}}
            {{--            <i><?php echo $app->trans('no.entries') ?></i>--}}
            {{--            {{/each}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="selectUserContent">
    <div class="canned-messages-wrapper">
        <div class="users">
            {{--            {{#each users}}--}}
            {{--            <a class="user-item {{#isSelected}}selected{{/isSelected}}" data-user="{{this}}">--}}
            {{--                <b>{{displayName}}</b> (<i>{{displayMail}}</i>)--}}
            {{--            </a>--}}
            {{--            {{else}}--}}
            {{--            <i><?php echo $app->trans('no.entries') ?></i>--}}
            {{--            {{/each}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="transferAndLeaveContent">
    <div class="canned-messages-wrapper">
        {{__('lang.Close_Talk_Msg')}}
        <div class="users"></div>
    </div>
</script>

<script type="text/x-handlebars-template" id="mailTalkTranscript">
    <div class="mail-transcript">
        <div class="mail-transcript__info">
            {{__('lang.Mail_Transcript_Info')}}
        </div>
        <div>
            <input id="customer-chat-transcript-mail" type="text" class="customer-chat-content-message-input-field" placeholder="{{__('lang.Mail')}}" />
        </div>
    </div>
</script>
<script type="text/x-handlebars-template" id="onlineUsersItem">
    {{--    <div class="customer-chat-history-item {{#if anonymous}}anonymous{{/if}}">--}}
    <a href="#" class="customer-chat-history-item-username">
        {{--            {{displayName}}--}}
        {{--            <span>{{shortUrl}}</span>--}}
    </a>
    <div class="customer-chat-history-item-time">
        {{--            {{#if inviting}}--}}
        <i class="fa fa-hourglass-start"></i>
        {{--            {{else if invited}}--}}
        <i class="fa fa-sign-in"></i>
        {{--            {{else if inviteError}}--}}
        <i class="fa fa-exclamation-circle"></i>
        {{--            {{else if anonymous}}--}}
        <i class="fa fa-question-circle"></i>
        {{--            {{else}}--}}
        <i class="fa fa-check-circle"></i>
        {{--            {{/if}}--}}
    </div>
    {{--    </div>--}}
</script>

<script type="text/x-handlebars-template" id="historyListItem">
    <div class="customer-chat-history-item">
        {{--        <a href="#" class="customer-chat-history-item-username"><?php echo $app->trans('talk') ?> {{talk_id}}</a>--}}
        {{--        <div class="customer-chat-history-item-time">{{displayDate}}</div>--}}
    </div>
</script>

<script type="text/x-handlebars-template" id="historyListDisplayMore">
    <a id="history-list-display-more" href="#">
        <div class="button-label">
            {{__('lang.Display_More')}}
        </div>
        <div>
            <i class="icon-chevron-down"></i>
        </div>
    </a>
</script>

<script type="text/x-handlebars-template" id="userInfoPopoverContent">
    <div class="customer-chat-talk-header-users">
        <div class="user-avatar">
            {{--            <i class="avatar customer-chat-content-message-avatar-operator"{{#if image}} style="background-image: url({{image}});"{{/if}}></i>--}}
        </div>
        <div class="user-info">
            <div>
                <span class="name">{{__('lang.Name')}}:</span>
                {{--                <span id="user-popover-name" class="value">{{name}}</span>--}}
            </div>
            <div>
                <span class="name">{{__('lang.id')}}:</span>
                {{--                <span id="user-popover-id" class="value">{{id}}</span>--}}
            </div>
            <div>
                <span class="name">{{__('lang.Mail')}}:</span>
                {{--                <span id="user-popover-mail" class="value">{{mail}}</span>--}}
            </div>
            {{--            {{#if ip}}--}}
            <div>
                <span class="name">{{__('lang.ip')}}:</span>
                {{--                <span id="user-popover-ip" class="value">{{ip}}</span>--}}
            </div>
            {{--            {{/if}}--}}
            {{--            {{#if referer}}--}}
            <div>
                <span class="name">{{__('lang.url')}}:</span>
                {{--                <span id="user-popover-referer" class="value">{{referer}}</span>--}}
            </div>
            {{--            {{/if}}--}}
        </div>
        <div class="clear-both"></div>
    </div>
    <div class="popover-space"></div>
</script>

{{--<script type="text/x-handlebars-template" id="userInfo">--}}
{{--    <div class="user-avatar">--}}
{{--        <i class="customer-chat-content-message-avatar-operator"></i>--}}
{{--    </div>--}}
{{--    <div class="user-info">--}}
{{--        <div class="row-show-on-map">--}}
{{--            <a href="#" class="show-on-map button customer-chat-content-button"><i class="fa fa-map-marker"></i> <?php echo $app->trans('show.on.map') ?></a>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="name"><?php echo $app->trans('name') ?>:</span>--}}
{{--            <span class="info-name value"></span>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="name"><?php echo $app->trans('id') ?>:</span>--}}
{{--            <span class="info-id value"></span>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="name"><?php echo $app->trans('mail') ?>:</span>--}}
{{--            <span class="info-email value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-ip">--}}
{{--            <span class="name"><?php echo $app->trans('ip') ?>:</span>--}}
{{--            <span class="info-ip value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-url">--}}
{{--            <span class="name"><?php echo $app->trans('url') ?>:</span>--}}
{{--            <a class="info-url value" target="_blank"></a>--}}
{{--        </div>--}}
{{--        <div class="row-browser">--}}
{{--            <span class="name"><?php echo $app->trans('browser') ?>:</span>--}}
{{--            <span class="info-browser value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-os">--}}
{{--            <span class="name"><?php echo $app->trans('system') ?>:</span>--}}
{{--            <span class="info-os value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-country">--}}
{{--            <span class="name"><?php echo $app->trans('country') ?>:</span>--}}
{{--            <span class="info-country value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-region">--}}
{{--            <span class="name"><?php echo $app->trans('region') ?>:</span>--}}
{{--            <span class="info-region value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-city">--}}
{{--            <span class="name"><?php echo $app->trans('city') ?>:</span>--}}
{{--            <span class="info-city value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-zip">--}}
{{--            <span class="name"><?php echo $app->trans('zip.code') ?>:</span>--}}
{{--            <span class="info-zip value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-timezone">--}}
{{--            <span class="name"><?php echo $app->trans('time.zone') ?>:</span>--}}
{{--            <span class="info-timezone value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-localtime">--}}
{{--            <span class="name"><?php echo $app->trans('local.time') ?>:</span>--}}
{{--            <span class="info-localtime value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-latitude">--}}
{{--            <span class="name"><?php echo $app->trans('latitude') ?>:</span>--}}
{{--            <span class="info-latitude value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-longitude">--}}
{{--            <span class="name"><?php echo $app->trans('longitude') ?>:</span>--}}
{{--            <span class="info-longitude value"></span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="tabButtonChat">--}}
{{--    <a href="#" class="customer-chat-tab customer-chat-tab-button"><span></span> <i class="icon-envelope new-msg"></i> <i class="icon-remove close"></i></a>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="tabContentChat">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-chat chat-box file-drop-zone">--}}
{{--        <div class="file-drop-zone-effect">--}}
{{--            <i class="fa fa-upload"></i>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-talk-header live">--}}
{{--            <div class="current-url-container"><span class="name"><?php echo $app->trans('guest.watching') ?>:</span> <a class="current-url" href="#" target="_blank"><?php echo $app->trans('unknown') ?></a></div>--}}
{{--            <div class="participants-header"><?php echo $app->trans('participants') ?></div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-talk-header-users">--}}
{{--            <div class="actions">--}}
{{--                <a class="invite customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('invite.user') ?> <i class="icon-plus"></i></a>--}}
{{--                <a class="leave customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('leave.talk') ?> <i class="icon-remove"></i></a>--}}
{{--                <a class="btn-mail-transcript customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('mailTranscriptLabel') ?> <i class="icon-envelope"></i></a>--}}
{{--            </div>--}}

{{--            <div class="participants-scroller">--}}
{{--                <div class="participants-content"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-emots-menu">--}}
{{--            <div class="customer-chat-header-menu-triangle"></div>--}}

{{--            <a href="#" data-emot=":)" class="customer-chat-emoticon"><i class="emot emot-1" alt=":)" title=":)"></i></a>--}}
{{--            <a href="#" data-emot=";)" class="customer-chat-emoticon"><i class="emot emot-2" alt=";)" title=";)"></i></a>--}}
{{--            <a href="#" data-emot=":(" class="customer-chat-emoticon"><i class="emot emot-3" alt=":(" title=":("></i></a>--}}
{{--            <a href="#" data-emot=":D" class="customer-chat-emoticon"><i class="emot emot-4" alt=":D" title=":D"></i></a>--}}
{{--            <a href="#" data-emot=":P" class="customer-chat-emoticon"><i class="emot emot-5" alt=":P" title=":P"></i></a>--}}
{{--            <a href="#" data-emot="=)" class="customer-chat-emoticon"><i class="emot emot-6" alt="=)" title="=)"></i></a>--}}
{{--            <a href="#" data-emot=":|" class="customer-chat-emoticon"><i class="emot emot-7" alt=":|" title=":|"></i></a>--}}
{{--            <a href="#" data-emot="=|" class="customer-chat-emoticon"><i class="emot emot-8" alt="=|" title="=|"></i></a>--}}
{{--            <a href="#" data-emot=">:|" class="customer-chat-emoticon"><i class="emot emot-9" alt=">:|" title=">:|"></i></a>--}}
{{--            <a href="#" data-emot=">:D" class="customer-chat-emoticon"><i class="emot emot-10" alt=">:D" title=">:D"></i></a>--}}

{{--            <a href="#" data-emot="o_O" class="customer-chat-emoticon"><i class="emot emot-11" alt="o_O" title="o_O"></i></a>--}}
{{--            <a href="#" data-emot="=O" class="customer-chat-emoticon"><i class="emot emot-12" alt="=O" title="=O"></i></a>--}}
{{--            <a href="#" data-emot="<3" class="customer-chat-emoticon"><i class="emot emot-13" alt="<3" title="<3"></i></a>--}}
{{--            <a href="#" data-emot=":S" class="customer-chat-emoticon"><i class="emot emot-14" alt=":S" title=":S"></i></a>--}}
{{--            <a href="#" data-emot=":*" class="customer-chat-emoticon"><i class="emot emot-15" alt=":*" title=":*"></i></a>--}}
{{--            <a href="#" data-emot=":$" class="customer-chat-emoticon"><i class="emot emot-16" alt=":$" title=":$"></i></a>--}}
{{--            <a href="#" data-emot="=B" class="customer-chat-emoticon"><i class="emot emot-17" alt="=B" title="=B"></i></a>--}}
{{--            <a href="#" data-emot=":-D" class="customer-chat-emoticon"><i class="emot emot-18" alt=":-D" title=":-D"></i></a>--}}
{{--            <a href="#" data-emot=";-D" class="customer-chat-emoticon"><i class="emot emot-19" alt=";-D" title=";-D"></i></a>--}}
{{--            <a href="#" data-emot="*-D" class="customer-chat-emoticon"><i class="emot emot-20" alt="*-D" title="*-D"></i></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message-input">--}}
{{--            <div class="typing-indicator"><i class="icon icon-pencil"></i></div>--}}
{{--            <input type="text" class="customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('your.msg') ?>" />--}}
{{--            <label class="file-button" for="file-input-{{id}}">--}}
{{--                <i class="fa fa-upload"></i>--}}
{{--                <input type="file" id="file-input-{{id}}" name="files[]" multiple>--}}
{{--            </label>--}}
{{--            <div class="customer-chat-content-message-emots-button"></div>--}}
{{--            <a href="#" class="btn-canned-msg"><?php echo $app->trans('canned') ?> <i class="icon-folder-open"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="chatTab">--}}
{{--    <div>--}}
{{--        <div id="customer-chat-users-online">--}}
{{--            <div class="customer-chat-talk-header"><?php echo $app->trans('online.users') ?></div>--}}
{{--            <div class="customer-chat-content-messages users">--}}
{{--                <div class="customer-chat-content-messages-wrapper users"></div>--}}
{{--            </div>--}}

{{--            <div class="customer-chat-talk-header operators"><?php echo $app->trans('online.operators') ?></div>--}}
{{--            <div class="customer-chat-content-messages operators">--}}
{{--                <div class="customer-chat-content-messages-wrapper operators"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="chat-wrapper">--}}
{{--        <div class="customer-chat-tabs">--}}
{{--            <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>--}}
{{--            <div class="customer-chat-tabs-wrapper"></div>--}}
{{--            <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="chat-placeholder"><?php echo $app->trans('chat.offline.info') ?></div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="settings">--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--    </div>--}}

{{--    <div class="customer-chat-content-message">--}}
{{--        <a href="#" id="customer-chat-ui-save" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--        <a href="#" id="customer-chat-ui-reset" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('reset.to.def') ?></a>--}}
{{--        <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>">--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="textInput">--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <input type="text" name="{{name}}" class="customer-chat-content-message-input-field" value="{{value}}">--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="checkbox">--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <div class="customer-chat-content-message-input-field customer-chat-content-message-input-checkbox">--}}
{{--        <input type="checkbox" name="{{name}}" {{#isChecked}}checked="chedked"{{/isChecked}}/>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="select">--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <select name="{{name}}" class="customer-chat-content-message-input-field">--}}
{{--        {{#each meta.options}}--}}
{{--        <option value="{{value}}" {{#isSelected}}selected="selected"{{/isSelected}}>{{label}}</option>--}}
{{--        {{/each}}--}}
{{--    </select>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="widgetTheme">--}}
{{--    <div class="widget-theme-preview-wrapper">--}}
{{--        <img id="widget-theme-preview">--}}
{{--    </div>--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <select name="{{name}}" class="customer-chat-content-message-input-field">--}}
{{--        {{#each meta.options}}--}}
{{--        <option value="{{value}}" {{#isSelected}}selected="selected"{{/isSelected}}>{{label}}</option>--}}
{{--        {{/each}}--}}
{{--    </select>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="departments">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-departments customer-chat-tab-content-departments-list" id="customer-chat-departments-list">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('departments') ?></div>--}}
{{--            <a id="customer-chat-departments-add" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('add.new') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-departments-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-departments" id="customer-chat-departments-edit">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('edit.department') ?></div>--}}
{{--            <a id="customer-chat-departments-back" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('back.to.list') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages edit-department">--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('name') ?></div>--}}
{{--                <input type="text" id="departmentNameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Department name" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('description') ?></div>--}}
{{--                <input type="text" id="departmentDescriptionField" class="customer-chat-content-message-input-field" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row select-list-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('operators') ?></div>--}}
{{--                <div class="select-list"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-departments-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="operators">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('operators') ?></div>--}}
{{--            <a id="customer-chat-operators-add" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('add.new') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators" id="customer-chat-operators-edit">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('edit.op') ?></div>--}}
{{--            <a id="customer-chat-operators-back" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('back.to.list') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages edit-operator">--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('user.name') ?></div>--}}
{{--                <input type="text" id="usernameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('mail') ?></div>--}}
{{--                <input type="text" id="mailField" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row select-list-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('departments') ?></div>--}}
{{--                <div class="select-list"></div>--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('pass') ?></div>--}}
{{--                <input type="password" id="passField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="rePassField" data-validator-state="add" data-validator-label="Password" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('retype.pass') ?></div>--}}
{{--                <input type="password" id="rePassField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="passField" data-validator-state="add" data-validator-msg="false" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('avatar') ?></div>--}}
{{--                <i id="imageField" class="avatar customer-chat-content-message-avatar-operator"></i>--}}
{{--                <div class="customer-chat-upload-field customer-chat-content-message-input-field">--}}
{{--                    <input id="avatarUploadField" name="avatar" type="file" />--}}
{{--                </div>--}}
{{--                <a href="#" id="avatar-from-collection" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('from.coll') ?></a>--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only current-pass">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('curr.pass') ?></div>--}}
{{--                <input type="password" id="changePassCurrentField" class="customer-chat-content-message-input-field" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('new.pass') ?></div>--}}
{{--                <input type="password" id="changePassField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="changePassRetypeField" data-validator-state="pass" data-validator-label="Password" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('retype.new.pass') ?></div>--}}
{{--                <input type="password" id="changePassRetypeField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="changePassField" data-validator-state="pass" data-validator-msg="false" />--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-operators-change-password" href="#" class="customer-chat-content-button customer-chat-content-button-inline edit-only"><?php echo $app->trans('change.pass') ?></a>--}}
{{--            <a id="customer-chat-operators-cancel" href="#" class="customer-chat-content-button customer-chat-content-button-inline pass-only"><?php echo $app->trans('cancel') ?></a>--}}
{{--            <a id="customer-chat-operators-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="cannedMessages">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-canned-messages customer-chat-tab-content-canned-messages-list" id="customer-chat-canned-messages-list">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('canned.msgs') ?></div>--}}
{{--            <a id="customer-chat-canned-messages-add" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('add.new') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-canned-messages" id="customer-chat-canned-messages-edit">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('edit.msg') ?></div>--}}
{{--            <a id="customer-chat-canned-messages-back" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('back.to.list') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages edit-canned-message">--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('name') ?></div>--}}
{{--                <input type="text" id="messageNameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Message name" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('body') ?></div>--}}
{{--                <input type="text" id="messageBodyField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Message body" data-validator-state-ex="pass" />--}}
{{--                <p class="input-note"><?php echo $app->trans('placeholder.hint') ?></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-canned-messages-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="blacklist">--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="wrapper">--}}
{{--            <div class="customer-chat-label"><?php echo $app->trans('pages.no.widget') ?></div>--}}
{{--            <div class="input-note"><?php echo $app->trans('no.widget.hint') ?></div>--}}
{{--            <textarea class="customer-chat-content-message-input-field"><?php echo isset($vars['widgetBlacklist']) ? $vars['widgetBlacklist'] : '' ?></textarea>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-content-message button-row">--}}
{{--        <a href="#" class="save customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--        <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="history">--}}
{{--    <div class="customer-chat-history-list">--}}
{{--        <div id="customer-chat-history-filters">--}}
{{--            <div class="customer-chat-content-row">--}}
{{--                <input type="text" name="name" id="searchUsername" class="customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('user.name') ?>" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row">--}}
{{--                <input type="text" name="mail" id="searchEmail" class="customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('mail') ?>" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row">--}}
{{--                <div id="searchFromDateWrapper" class="date-input-wrapper">--}}
{{--                    <input type="text" name="fromDate" id="searchFromDate" class="date-input customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('from.date') ?>" />--}}
{{--                    <i class="icon-calendar"></i>--}}
{{--                </div>--}}
{{--                <div id="searchToDateWrapper" class="date-input-wrapper">--}}
{{--                    <input type="text" name="toDate" id="searchToDate" class="date-input customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('to.date') ?>" />--}}
{{--                    <i class="icon-calendar"></i>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="customer-chat-content-message">--}}
{{--                <a href="#" id="customer-chat-history-search" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('search') ?></a>--}}
{{--                <a href="#" id="customer-chat-history-clear" class="customer-chat-content-button customer-chat-content-button-inline warning"><?php echo $app->trans('clear.history') ?></a>--}}
{{--                <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="customer-chat-history-search-results" class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="customer-chat-history-chat">--}}
{{--        <div class="customer-chat-talk-header" id="customer-chat-talk-header">--}}
{{--            <div class="date-info"></div>--}}
{{--            <div class="participants-header"><?php echo $app->trans('participants') ?></div>--}}
{{--        </div>--}}
{{--        <div id="history-results-chat" class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--        <div class="customer-chat-talk-header-users">--}}
{{--            <div class="actions">--}}
{{--                <a class="btn-mail-transcript customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('mailTranscriptLabel') ?> <i class="icon-envelope"></i></a>--}}
{{--            </div>--}}

{{--            <div class="participants-scroller">--}}
{{--                <div class="participants-content"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="logs">--}}
{{--    <div class="customer-chat-talk-header"><?php echo $app->trans('logs') ?></div>--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--    </div>--}}

{{--    <div class="customer-chat-content-message">--}}
{{--        <a href="#" id="customer-chat-logs-refresh" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('refresh') ?></a>--}}
{{--        <a href="<?php echo $app->path('Admin:logs') ?>" target="_blank" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('open.in.n.w') ?></a>--}}
{{--        <a href="#" id="customer-chat-logs-clear" class="customer-chat-content-button customer-chat-content-button-inline warning"><?php echo $app->trans('clear') ?></a>--}}
{{--        <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="qrCode">--}}
{{--    <div class="customer-chat-talk-header"><?php echo $app->trans('qr.code') ?></div>--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="customer-chat-content-messages-wrapper">--}}
{{--            <p class="qr-code-info"><?php echo $app->trans('qr.code.info') ?></p>--}}
{{--            <div>--}}
{{--                <img class="qr-code-img" src="<?php echo $app->asset('img/mobile-start.png') ?>">--}}
{{--                <i class="qr-code-arrow fa fa-long-arrow-right"></i>--}}
{{--                <div class="qr-code"></div>--}}
{{--            </div>--}}
{{--            <p class="qr-code-note"><?php echo $app->trans('qr.code.note') ?></p>--}}
{{--            <a target="_blank" href="https://play.google.com/store/apps/details?id=net.mirrormx.livechat"><img src="<?php echo $app->asset('img/google-play-logo.png') ?>"></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

<script type="text/x-handlebars-template" id="operatorItem">
    <div class="customer-chat-content-row">
        <div class="customer-chat-label">
            {{--            <i class="avatar customer-chat-content-message-avatar-operator"{{#if image}} style="background-image: url({{image}});"{{/if}}></i> <span class="customer-chat-operator-name">{{name}}</span>--}}
        </div>
        {{--        <div class="customer-chat-label customer-chat-operator-mail">{{mail}}</div>--}}
        <div class="customer-chat-tab-content-operators-actions">
            {{--            <a class="customer-chat-operators-edit" href="#" data-id="{{id}}"><i class="icon-edit"></i></a>--}}
            {{--            {{#if removeVisible}}<a class="customer-chat-operators-remove" href="#" data-id={{id}}><i class="icon-remove"></i></a>{{/if}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="departmentItem">
    <div class="customer-chat-content-row">
        <div class="customer-chat-label">
            {{--            <span class="customer-chat-department-name">{{name}}</span>--}}
        </div>
        {{--        <div class="customer-chat-label customer-chat-department-description">{{description}}</div>--}}
        <div class="customer-chat-tab-content-departments-actions">
            {{--            <a class="customer-chat-departments-edit" href="#" data-id="{{id}}"><i class="icon-edit"></i></a>--}}
            {{--            <a class="customer-chat-departments-remove" href="#" data-id="{{id}}"><i class="icon-remove"></i></a>--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="cannedMessageItem">
    <div class="customer-chat-content-row">
        <div class="customer-chat-label">
            {{--            <span class="customer-chat-canned-message-name">{{name}}</span>--}}
        </div>
        {{--        <div class="customer-chat-label customer-chat-canned-message-body">{{body}}</div>--}}
        <div class="customer-chat-tab-content-canned-messages-actions">
            {{--            <a class="customer-chat-canned-messages-edit" href="#" data-id="{{id}}"><i class="icon-edit"></i></a>--}}
            {{--            <a class="customer-chat-canned-messages-remove" href="#" data-id="{{id}}"><i class="icon-remove"></i></a>--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="installDialogContent">
    <p>Confirm to install the application</p>
</script>

<script type="text/x-handlebars-template" id="invalidInstallDialogContent">
    <p> {{__('lang.Invalid_Installation')}} </p>
</script>

<script type="text/x-handlebars-template" id="confirmDialog" title="Remove the user?">
    <p> {{__('lang.Delete_User')}} </p>
</script>

<script type="text/x-handlebars-template" id="formErrorDialog">
    <div id="dialog-form-error" title="Form error"></div>
</script>

<script type="text/x-handlebars-template" id="widgetCodeContent">
    <div class="widget-code">
        <div class="customer-chat-tabs">
            <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>
            <div class="customer-chat-tabs-wrapper">
                <a href="#" class="customer-chat-tab customer-chat-tab-button customer-chat-active"> {{__('lang.Bottom_Right')}} </a>
                <a href="#" class="customer-chat-tab customer-chat-tab-button"> {{__('lang.Inline')}} </a>
            </div>
            <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>
        </div>
        <div class="customer-chat-tab-content">
            <div class="code-wrapper">
                {{--                <code>&lt;script&gt;(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','{{src}}');&lt;/script&gt;</code>--}}
            </div>
        </div>
        <div class="customer-chat-tab-content">
            <div class="code-wrapper">
                {{--                <code>&lt;script id="__init-script-inline-widget__"&gt;(function(d,t,u,s,e){e=d.getElementsByTagName(t)[0];s=d.createElement(t);s.src=u;s.async=1;e.parentNode.insertBefore(s,e);})(document,'script','{{srcInline}}');&lt;/script&gt;</code>--}}
            </div>
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="selectAvatarContent">
    <div class="avatars-wrapper">
        <div class="avatars">
            {{--            {{#each urls}}--}}
            {{--            <i class="customer-chat-content-message-avatar" style="background-image: url({{this}});" data-image="{{this}}"></i>--}}
            {{--            {{/each}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="selectCannedMessageContent">
    <div class="canned-messages-wrapper">
        <div class="messages">
            {{--            {{#each messages}}--}}
            {{--            <a class="customer-chat-content-canned-message" data-message="{{body}}">--}}
            {{--                <b>{{displayName name}}</b> (<i>{{displayBody body}}</i>)--}}
            {{--            </a>--}}
            {{--            {{else}}--}}
            {{--            <i><?php echo $app->trans('no.entries') ?></i>--}}
            {{--            {{/each}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="selectUserContent">
    <div class="canned-messages-wrapper">
        <div class="users">
            {{--            {{#each users}}--}}
            {{--            <a class="user-item {{#isSelected}}selected{{/isSelected}}" data-user="{{this}}">--}}
            {{--                <b>{{displayName}}</b> (<i>{{displayMail}}</i>)--}}
            {{--            </a>--}}
            {{--            {{else}}--}}
            {{--            <i><?php echo $app->trans('no.entries') ?></i>--}}
            {{--            {{/each}}--}}
        </div>
    </div>
</script>

<script type="text/x-handlebars-template" id="transferAndLeaveContent">
    <div class="canned-messages-wrapper">
        {{__('lang.Close_Talk_Msg')}}
        <div class="users"></div>
    </div>
</script>

<script type="text/x-handlebars-template" id="mailTalkTranscript">
    <div class="mail-transcript">
        <div class="mail-transcript__info">
            {{__('lang.Mail_Transcript_Info')}}
        </div>
        <div>
            <input id="customer-chat-transcript-mail" type="text" class="customer-chat-content-message-input-field" placeholder="{{__('lang.Mail')}}" />
        </div>
    </div>
</script>
<script type="text/x-handlebars-template" id="onlineUsersItem">
    {{--    <div class="customer-chat-history-item {{#if anonymous}}anonymous{{/if}}">--}}
    <a href="#" class="customer-chat-history-item-username">
        {{--            {{displayName}}--}}
        {{--            <span>{{shortUrl}}</span>--}}
    </a>
    <div class="customer-chat-history-item-time">
        {{--            {{#if inviting}}--}}
        <i class="fa fa-hourglass-start"></i>
        {{--            {{else if invited}}--}}
        <i class="fa fa-sign-in"></i>
        {{--            {{else if inviteError}}--}}
        <i class="fa fa-exclamation-circle"></i>
        {{--            {{else if anonymous}}--}}
        <i class="fa fa-question-circle"></i>
        {{--            {{else}}--}}
        <i class="fa fa-check-circle"></i>
        {{--            {{/if}}--}}
    </div>
    {{--    </div>--}}
</script>

<script type="text/x-handlebars-template" id="historyListItem">
    <div class="customer-chat-history-item">
        {{--        <a href="#" class="customer-chat-history-item-username"><?php echo $app->trans('talk') ?> {{talk_id}}</a>--}}
        {{--        <div class="customer-chat-history-item-time">{{displayDate}}</div>--}}
    </div>
</script>

<script type="text/x-handlebars-template" id="historyListDisplayMore">
    <a id="history-list-display-more" href="#">
        <div class="button-label">
            {{__('lang.Display_More')}}
        </div>
        <div>
            <i class="icon-chevron-down"></i>
        </div>
    </a>
</script>

<script type="text/x-handlebars-template" id="userInfoPopoverContent">
    <div class="customer-chat-talk-header-users">
        <div class="user-avatar">
            {{--            <i class="avatar customer-chat-content-message-avatar-operator"{{#if image}} style="background-image: url({{image}});"{{/if}}></i>--}}
        </div>
        <div class="user-info">
            <div>
                <span class="name">{{__('lang.Name')}}:</span>
                {{--                <span id="user-popover-name" class="value">{{name}}</span>--}}
            </div>
            <div>
                <span class="name">{{__('lang.id')}}:</span>
                {{--                <span id="user-popover-id" class="value">{{id}}</span>--}}
            </div>
            <div>
                <span class="name">{{__('lang.Mail')}}:</span>
                {{--                <span id="user-popover-mail" class="value">{{mail}}</span>--}}
            </div>
            {{--            {{#if ip}}--}}
            <div>
                <span class="name">{{__('lang.ip')}}:</span>
                {{--                <span id="user-popover-ip" class="value">{{ip}}</span>--}}
            </div>
            {{--            {{/if}}--}}
            {{--            {{#if referer}}--}}
            <div>
                <span class="name">{{__('lang.url')}}:</span>
                {{--                <span id="user-popover-referer" class="value">{{referer}}</span>--}}
            </div>
            {{--            {{/if}}--}}
        </div>
        <div class="clear-both"></div>
    </div>
    <div class="popover-space"></div>
</script>

{{--<script type="text/x-handlebars-template" id="userInfo">--}}
{{--    <div class="user-avatar">--}}
{{--        <i class="customer-chat-content-message-avatar-operator"></i>--}}
{{--    </div>--}}
{{--    <div class="user-info">--}}
{{--        <div class="row-show-on-map">--}}
{{--            <a href="#" class="show-on-map button customer-chat-content-button"><i class="fa fa-map-marker"></i> <?php echo $app->trans('show.on.map') ?></a>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="name"><?php echo $app->trans('name') ?>:</span>--}}
{{--            <span class="info-name value"></span>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="name"><?php echo $app->trans('id') ?>:</span>--}}
{{--            <span class="info-id value"></span>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <span class="name"><?php echo $app->trans('mail') ?>:</span>--}}
{{--            <span class="info-email value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-ip">--}}
{{--            <span class="name"><?php echo $app->trans('ip') ?>:</span>--}}
{{--            <span class="info-ip value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-url">--}}
{{--            <span class="name"><?php echo $app->trans('url') ?>:</span>--}}
{{--            <a class="info-url value" target="_blank"></a>--}}
{{--        </div>--}}
{{--        <div class="row-browser">--}}
{{--            <span class="name"><?php echo $app->trans('browser') ?>:</span>--}}
{{--            <span class="info-browser value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-os">--}}
{{--            <span class="name"><?php echo $app->trans('system') ?>:</span>--}}
{{--            <span class="info-os value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-country">--}}
{{--            <span class="name"><?php echo $app->trans('country') ?>:</span>--}}
{{--            <span class="info-country value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-region">--}}
{{--            <span class="name"><?php echo $app->trans('region') ?>:</span>--}}
{{--            <span class="info-region value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-city">--}}
{{--            <span class="name"><?php echo $app->trans('city') ?>:</span>--}}
{{--            <span class="info-city value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-zip">--}}
{{--            <span class="name"><?php echo $app->trans('zip.code') ?>:</span>--}}
{{--            <span class="info-zip value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-timezone">--}}
{{--            <span class="name"><?php echo $app->trans('time.zone') ?>:</span>--}}
{{--            <span class="info-timezone value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-localtime">--}}
{{--            <span class="name"><?php echo $app->trans('local.time') ?>:</span>--}}
{{--            <span class="info-localtime value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-latitude">--}}
{{--            <span class="name"><?php echo $app->trans('latitude') ?>:</span>--}}
{{--            <span class="info-latitude value"></span>--}}
{{--        </div>--}}
{{--        <div class="row-longitude">--}}
{{--            <span class="name"><?php echo $app->trans('longitude') ?>:</span>--}}
{{--            <span class="info-longitude value"></span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="tabButtonChat">--}}
{{--    <a href="#" class="customer-chat-tab customer-chat-tab-button"><span></span> <i class="icon-envelope new-msg"></i> <i class="icon-remove close"></i></a>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="tabContentChat">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-chat chat-box file-drop-zone">--}}
{{--        <div class="file-drop-zone-effect">--}}
{{--            <i class="fa fa-upload"></i>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-talk-header live">--}}
{{--            <div class="current-url-container"><span class="name"><?php echo $app->trans('guest.watching') ?>:</span> <a class="current-url" href="#" target="_blank"><?php echo $app->trans('unknown') ?></a></div>--}}
{{--            <div class="participants-header"><?php echo $app->trans('participants') ?></div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-talk-header-users">--}}
{{--            <div class="actions">--}}
{{--                <a class="invite customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('invite.user') ?> <i class="icon-plus"></i></a>--}}
{{--                <a class="leave customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('leave.talk') ?> <i class="icon-remove"></i></a>--}}
{{--                <a class="btn-mail-transcript customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('mailTranscriptLabel') ?> <i class="icon-envelope"></i></a>--}}
{{--            </div>--}}

{{--            <div class="participants-scroller">--}}
{{--                <div class="participants-content"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-emots-menu">--}}
{{--            <div class="customer-chat-header-menu-triangle"></div>--}}

{{--            <a href="#" data-emot=":)" class="customer-chat-emoticon"><i class="emot emot-1" alt=":)" title=":)"></i></a>--}}
{{--            <a href="#" data-emot=";)" class="customer-chat-emoticon"><i class="emot emot-2" alt=";)" title=";)"></i></a>--}}
{{--            <a href="#" data-emot=":(" class="customer-chat-emoticon"><i class="emot emot-3" alt=":(" title=":("></i></a>--}}
{{--            <a href="#" data-emot=":D" class="customer-chat-emoticon"><i class="emot emot-4" alt=":D" title=":D"></i></a>--}}
{{--            <a href="#" data-emot=":P" class="customer-chat-emoticon"><i class="emot emot-5" alt=":P" title=":P"></i></a>--}}
{{--            <a href="#" data-emot="=)" class="customer-chat-emoticon"><i class="emot emot-6" alt="=)" title="=)"></i></a>--}}
{{--            <a href="#" data-emot=":|" class="customer-chat-emoticon"><i class="emot emot-7" alt=":|" title=":|"></i></a>--}}
{{--            <a href="#" data-emot="=|" class="customer-chat-emoticon"><i class="emot emot-8" alt="=|" title="=|"></i></a>--}}
{{--            <a href="#" data-emot=">:|" class="customer-chat-emoticon"><i class="emot emot-9" alt=">:|" title=">:|"></i></a>--}}
{{--            <a href="#" data-emot=">:D" class="customer-chat-emoticon"><i class="emot emot-10" alt=">:D" title=">:D"></i></a>--}}

{{--            <a href="#" data-emot="o_O" class="customer-chat-emoticon"><i class="emot emot-11" alt="o_O" title="o_O"></i></a>--}}
{{--            <a href="#" data-emot="=O" class="customer-chat-emoticon"><i class="emot emot-12" alt="=O" title="=O"></i></a>--}}
{{--            <a href="#" data-emot="<3" class="customer-chat-emoticon"><i class="emot emot-13" alt="<3" title="<3"></i></a>--}}
{{--            <a href="#" data-emot=":S" class="customer-chat-emoticon"><i class="emot emot-14" alt=":S" title=":S"></i></a>--}}
{{--            <a href="#" data-emot=":*" class="customer-chat-emoticon"><i class="emot emot-15" alt=":*" title=":*"></i></a>--}}
{{--            <a href="#" data-emot=":$" class="customer-chat-emoticon"><i class="emot emot-16" alt=":$" title=":$"></i></a>--}}
{{--            <a href="#" data-emot="=B" class="customer-chat-emoticon"><i class="emot emot-17" alt="=B" title="=B"></i></a>--}}
{{--            <a href="#" data-emot=":-D" class="customer-chat-emoticon"><i class="emot emot-18" alt=":-D" title=":-D"></i></a>--}}
{{--            <a href="#" data-emot=";-D" class="customer-chat-emoticon"><i class="emot emot-19" alt=";-D" title=";-D"></i></a>--}}
{{--            <a href="#" data-emot="*-D" class="customer-chat-emoticon"><i class="emot emot-20" alt="*-D" title="*-D"></i></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message-input">--}}
{{--            <div class="typing-indicator"><i class="icon icon-pencil"></i></div>--}}
{{--            <input type="text" class="customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('your.msg') ?>" />--}}
{{--            <label class="file-button" for="file-input-{{id}}">--}}
{{--                <i class="fa fa-upload"></i>--}}
{{--                <input type="file" id="file-input-{{id}}" name="files[]" multiple>--}}
{{--            </label>--}}
{{--            <div class="customer-chat-content-message-emots-button"></div>--}}
{{--            <a href="#" class="btn-canned-msg"><?php echo $app->trans('canned') ?> <i class="icon-folder-open"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="chatTab">--}}
{{--    <div>--}}
{{--        <div id="customer-chat-users-online">--}}
{{--            <div class="customer-chat-talk-header"><?php echo $app->trans('online.users') ?></div>--}}
{{--            <div class="customer-chat-content-messages users">--}}
{{--                <div class="customer-chat-content-messages-wrapper users"></div>--}}
{{--            </div>--}}

{{--            <div class="customer-chat-talk-header operators"><?php echo $app->trans('online.operators') ?></div>--}}
{{--            <div class="customer-chat-content-messages operators">--}}
{{--                <div class="customer-chat-content-messages-wrapper operators"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="chat-wrapper">--}}
{{--        <div class="customer-chat-tabs">--}}
{{--            <a href="#" class="customer-chat-tab customer-chat-tab-prev"><i class="icon-chevron-left"></i></a>--}}
{{--            <div class="customer-chat-tabs-wrapper"></div>--}}
{{--            <a href="#" class="customer-chat-tab customer-chat-tab-next"><i class="icon-chevron-right"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="chat-placeholder"><?php echo $app->trans('chat.offline.info') ?></div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="settings">--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--    </div>--}}

{{--    <div class="customer-chat-content-message">--}}
{{--        <a href="#" id="customer-chat-ui-save" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--        <a href="#" id="customer-chat-ui-reset" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('reset.to.def') ?></a>--}}
{{--        <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>">--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="textInput">--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <input type="text" name="{{name}}" class="customer-chat-content-message-input-field" value="{{value}}">--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="checkbox">--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <div class="customer-chat-content-message-input-field customer-chat-content-message-input-checkbox">--}}
{{--        <input type="checkbox" name="{{name}}" {{#isChecked}}checked="chedked"{{/isChecked}}/>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="select">--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <select name="{{name}}" class="customer-chat-content-message-input-field">--}}
{{--        {{#each meta.options}}--}}
{{--        <option value="{{value}}" {{#isSelected}}selected="selected"{{/isSelected}}>{{label}}</option>--}}
{{--        {{/each}}--}}
{{--    </select>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="widgetTheme">--}}
{{--    <div class="widget-theme-preview-wrapper">--}}
{{--        <img id="widget-theme-preview">--}}
{{--    </div>--}}
{{--    <div class="customer-chat-label">{{meta.label}}</div>--}}
{{--    <select name="{{name}}" class="customer-chat-content-message-input-field">--}}
{{--        {{#each meta.options}}--}}
{{--        <option value="{{value}}" {{#isSelected}}selected="selected"{{/isSelected}}>{{label}}</option>--}}
{{--        {{/each}}--}}
{{--    </select>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="departments">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-departments customer-chat-tab-content-departments-list" id="customer-chat-departments-list">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('departments') ?></div>--}}
{{--            <a id="customer-chat-departments-add" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('add.new') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-departments-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-departments" id="customer-chat-departments-edit">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('edit.department') ?></div>--}}
{{--            <a id="customer-chat-departments-back" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('back.to.list') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages edit-department">--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('name') ?></div>--}}
{{--                <input type="text" id="departmentNameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Department name" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('description') ?></div>--}}
{{--                <input type="text" id="departmentDescriptionField" class="customer-chat-content-message-input-field" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row select-list-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('operators') ?></div>--}}
{{--                <div class="select-list"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-departments-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="operators">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators customer-chat-tab-content-operators-list" id="customer-chat-operators-list">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('operators') ?></div>--}}
{{--            <a id="customer-chat-operators-add" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('add.new') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-operators" id="customer-chat-operators-edit">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('edit.op') ?></div>--}}
{{--            <a id="customer-chat-operators-back" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('back.to.list') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages edit-operator">--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('user.name') ?></div>--}}
{{--                <input type="text" id="usernameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Username" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('mail') ?></div>--}}
{{--                <input type="text" id="mailField" class="customer-chat-content-message-input-field" data-validator="mail" data-validator-label="E-mail" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row select-list-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('departments') ?></div>--}}
{{--                <div class="select-list"></div>--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('pass') ?></div>--}}
{{--                <input type="password" id="passField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="rePassField" data-validator-state="add" data-validator-label="Password" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('retype.pass') ?></div>--}}
{{--                <input type="password" id="rePassField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="passField" data-validator-state="add" data-validator-msg="false" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('avatar') ?></div>--}}
{{--                <i id="imageField" class="avatar customer-chat-content-message-avatar-operator"></i>--}}
{{--                <div class="customer-chat-upload-field customer-chat-content-message-input-field">--}}
{{--                    <input id="avatarUploadField" name="avatar" type="file" />--}}
{{--                </div>--}}
{{--                <a href="#" id="avatar-from-collection" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('from.coll') ?></a>--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only current-pass">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('curr.pass') ?></div>--}}
{{--                <input type="password" id="changePassCurrentField" class="customer-chat-content-message-input-field" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('new.pass') ?></div>--}}
{{--                <input type="password" id="changePassField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="changePassRetypeField" data-validator-state="pass" data-validator-label="Password" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row pass-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('retype.new.pass') ?></div>--}}
{{--                <input type="password" id="changePassRetypeField" class="customer-chat-content-message-input-field" data-validator="password" data-validator-match="changePassField" data-validator-state="pass" data-validator-msg="false" />--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-operators-change-password" href="#" class="customer-chat-content-button customer-chat-content-button-inline edit-only"><?php echo $app->trans('change.pass') ?></a>--}}
{{--            <a id="customer-chat-operators-cancel" href="#" class="customer-chat-content-button customer-chat-content-button-inline pass-only"><?php echo $app->trans('cancel') ?></a>--}}
{{--            <a id="customer-chat-operators-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="cannedMessages">--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-canned-messages customer-chat-tab-content-canned-messages-list" id="customer-chat-canned-messages-list">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('canned.msgs') ?></div>--}}
{{--            <a id="customer-chat-canned-messages-add" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('add.new') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-tab-content customer-chat-tab-content-settings customer-chat-tab-content-canned-messages" id="customer-chat-canned-messages-edit">--}}
{{--        <div class="customer-chat-content-message">--}}
{{--            <div class="customer-chat-tabs-header"><?php echo $app->trans('edit.msg') ?></div>--}}
{{--            <a id="customer-chat-canned-messages-back" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('back.to.list') ?></a>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-messages edit-canned-message">--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('name') ?></div>--}}
{{--                <input type="text" id="messageNameField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Message name" data-validator-state-ex="pass" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row add-only edit-only">--}}
{{--                <div class="customer-chat-label"><?php echo $app->trans('body') ?></div>--}}
{{--                <input type="text" id="messageBodyField" class="customer-chat-content-message-input-field" data-validator="notEmpty" data-validator-label="Message body" data-validator-state-ex="pass" />--}}
{{--                <p class="input-note"><?php echo $app->trans('placeholder.hint') ?></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="customer-chat-content-message button-row">--}}
{{--            <a id="customer-chat-canned-messages-save" href="#" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--            <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="blacklist">--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="wrapper">--}}
{{--            <div class="customer-chat-label"><?php echo $app->trans('pages.no.widget') ?></div>--}}
{{--            <div class="input-note"><?php echo $app->trans('no.widget.hint') ?></div>--}}
{{--            <textarea class="customer-chat-content-message-input-field"><?php echo isset($vars['widgetBlacklist']) ? $vars['widgetBlacklist'] : '' ?></textarea>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="customer-chat-content-message button-row">--}}
{{--        <a href="#" class="save customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('save') ?></a>--}}
{{--        <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="history">--}}
{{--    <div class="customer-chat-history-list">--}}
{{--        <div id="customer-chat-history-filters">--}}
{{--            <div class="customer-chat-content-row">--}}
{{--                <input type="text" name="name" id="searchUsername" class="customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('user.name') ?>" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row">--}}
{{--                <input type="text" name="mail" id="searchEmail" class="customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('mail') ?>" />--}}
{{--            </div>--}}
{{--            <div class="customer-chat-content-row">--}}
{{--                <div id="searchFromDateWrapper" class="date-input-wrapper">--}}
{{--                    <input type="text" name="fromDate" id="searchFromDate" class="date-input customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('from.date') ?>" />--}}
{{--                    <i class="icon-calendar"></i>--}}
{{--                </div>--}}
{{--                <div id="searchToDateWrapper" class="date-input-wrapper">--}}
{{--                    <input type="text" name="toDate" id="searchToDate" class="date-input customer-chat-content-message-input-field" placeholder="<?php echo $app->trans('to.date') ?>" />--}}
{{--                    <i class="icon-calendar"></i>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="customer-chat-content-message">--}}
{{--                <a href="#" id="customer-chat-history-search" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('search') ?></a>--}}
{{--                <a href="#" id="customer-chat-history-clear" class="customer-chat-content-button customer-chat-content-button-inline warning"><?php echo $app->trans('clear.history') ?></a>--}}
{{--                <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="customer-chat-history-search-results" class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="customer-chat-history-chat">--}}
{{--        <div class="customer-chat-talk-header" id="customer-chat-talk-header">--}}
{{--            <div class="date-info"></div>--}}
{{--            <div class="participants-header"><?php echo $app->trans('participants') ?></div>--}}
{{--        </div>--}}
{{--        <div id="history-results-chat" class="customer-chat-content-messages">--}}
{{--            <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--        </div>--}}
{{--        <div class="customer-chat-talk-header-users">--}}
{{--            <div class="actions">--}}
{{--                <a class="btn-mail-transcript customer-chat-content-button customer-chat-content-button-inline" href="#"><?php echo $app->trans('mailTranscriptLabel') ?> <i class="icon-envelope"></i></a>--}}
{{--            </div>--}}

{{--            <div class="participants-scroller">--}}
{{--                <div class="participants-content"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="logs">--}}
{{--    <div class="customer-chat-talk-header"><?php echo $app->trans('logs') ?></div>--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="customer-chat-content-messages-wrapper"></div>--}}
{{--    </div>--}}

{{--    <div class="customer-chat-content-message">--}}
{{--        <a href="#" id="customer-chat-logs-refresh" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('refresh') ?></a>--}}
{{--        <a href="<?php echo $app->path('Admin:logs') ?>" target="_blank" class="customer-chat-content-button customer-chat-content-button-inline"><?php echo $app->trans('open.in.n.w') ?></a>--}}
{{--        <a href="#" id="customer-chat-logs-clear" class="customer-chat-content-button customer-chat-content-button-inline warning"><?php echo $app->trans('clear') ?></a>--}}
{{--        <img class="customer-chat-content-loading-icon" src="<?php echo $app->asset('img/loading.gif') ?>" />--}}
{{--    </div>--}}
{{--</script>--}}

{{--<script type="text/x-handlebars-template" id="qrCode">--}}
{{--    <div class="customer-chat-talk-header"><?php echo $app->trans('qr.code') ?></div>--}}
{{--    <div class="customer-chat-content-messages">--}}
{{--        <div class="customer-chat-content-messages-wrapper">--}}
{{--            <p class="qr-code-info"><?php echo $app->trans('qr.code.info') ?></p>--}}
{{--            <div>--}}
{{--                <img class="qr-code-img" src="<?php echo $app->asset('img/mobile-start.png') ?>">--}}
{{--                <i class="qr-code-arrow fa fa-long-arrow-right"></i>--}}
{{--                <div class="qr-code"></div>--}}
{{--            </div>--}}
{{--            <p class="qr-code-note"><?php echo $app->trans('qr.code.note') ?></p>--}}
{{--            <a target="_blank" href="https://play.google.com/store/apps/details?id=net.mirrormx.livechat"><img src="<?php echo $app->asset('img/google-play-logo.png') ?>"></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</script>--}}
