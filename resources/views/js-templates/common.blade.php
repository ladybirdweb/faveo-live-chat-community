
<script type="text/x-handlebars-template" id="message">
    {{--    <div class="customer-chat-content-message{{#if isOperator}}-operator{{/if}} {{#if isSystem}}customer-chat-content-message-system{{/if}}">--}}
    <div class="avatar customer-chat-content-message-avatar"></div>
    <div class="customer-chat-content-message-column">
        {{--            <div class="customer-chat-content-message-author">{{author}}</div>--}}
        <div class="customer-chat-content-message-time"></div>
        <div class="customer-chat-content-message-body"></div>
        {{--        </div>--}}
        <div class="clear-both"></div>
    </div>
</script>

<script type="text/x-handlebars-template" id="messageImage">
    <a target="_blank" class="chat-inline-view" href="#">
        <i class="fa fa-picture-o"></i>
        <img class="image">
        {{--        <img class="loading-anim" src="{{ asset('img/loading.gif') }}" />--}}
    </a>
    <div class="url-wrapper">
        {{--        <a target="_blank" class="chat-inline-view-url" href="{{url}}">{{url}}</a>--}}
    </div>
</script>

<script type="text/x-handlebars-template" id="messageVideo">
    {{--    <a class="chat-inline-view video {{type}}">--}}
    {{--        <i class="fa fa-{{icon}}"></i>--}}
    <div class="iframe-wrapper">
        <iframe frameborder="0" allowfullscreen></iframe>
    </div>
    {{--        <img class="loading-anim" src="{{ asset('img/loading.gif') }}" />--}}
    {{--    </a>--}}
    <div class="url-wrapper">
        {{--        <a target="_blank" class="chat-inline-view-url" href="{{url}}">{{url}}</a>--}}
    </div>
</script>

<script type="text/x-handlebars-template" id="messageFile">
    <ul class="file-list">
        {{--        {{#each files}}--}}
        <li>
            {{--            <i class="file-icon fa fa-{{fileIcon}}"></i>--}}
            {{--            <span class="file-name">{{name}}</span>--}}
            {{--            <span class="file-size">{{fileSize}}</span>--}}
            <a class="download" href="#"><i class="fa fa-download"></i></a>
        </li>
        {{--        {{/each}}--}}
    </ul>
    <div class="controls">
        <div class="progress-col">
            {{--            {{#state 'uploading'}}--}}
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            {{--            {{/state}}--}}
            {{--            {{#state 'pending' null}}--}}
            <img class="loading-anim" src="{{ asset('img/loading.gif') }}" />
            {{--            {{/state}}--}}
        </div>
        <div class="actions">
            {{--            {{#if isUploading}}--}}
            {{--            {{#state 'pending' 'uploading'}}--}}
            <i class="abort fa fa-times"></i>
            {{--            {{/state}}--}}
            {{--            {{else}}--}}
            {{--            {{#showConfirmDeny}}--}}
            {{--            {{#state 'pending'}}--}}
            <i class="confirm fa fa-check"></i>
            {{--            {{/state}}--}}
            <i class="deny fa fa-ban"></i>
            {{--            {{/showConfirmDeny}}--}}
            {{--            {{/if}}--}}
        </div>
        {{--        {{#state 'aborted'}}--}}
        <div class="abort-info">
            {{__('lang.Canceled')}}
        </div>
        {{--        {{/state}}--}}
        {{--        {{#state 'error'}}--}}
        <div class="error-info">
            {{--            {{#if error}}--}}
            {{--            {{error}}--}}
            {{--            {{else}}--}}
            {{__('lang.Error')}}
            {{--            {{/if}}--}}
        </div>
        {{--        {{/state}}--}}
        {{--        {{#state 'denied'}}--}}
        <div class="denied-info">
            {{--            {{__('lang.Denied')}}--}}
        </div>
        {{--        {{/state}}--}}
        {{--        {{#state 'uploaded'}}--}}
        <div class="uploaded-info">
            <i class="fa fa-check"></i>
        </div>
        {{--        {{/state}}--}}
    </div>
</script>

<script type="text/x-handlebars-template" id="selectListContent">
    <div class="entries"></div>
    <div class="empty-content">
        {{__('lang.No_Entries')}}
    </div>
    {{--    {{#if actions}}--}}
    <div class="actions">
        <a href="#" class="select-all customer-chat-content-button customer-chat-content-button-inline"> {{__('lang.Select_All')}} </a>
        <a href="#" class="select-none customer-chat-content-button customer-chat-content-button-inline"> {{__('lang.Select_None')}} </a>
    </div>
    {{--    {{/if}}--}}
</script>
