.MSRS-RVC :focus {
    outline-color: orange;
}

.MSRS-RVC INPUT, .MSRS-RVC BUTTON, .MSRS-RVC SELECT, .MSRS-RVC TABLE, .MSRS-RVC BODY, .MSRS-RVC FRAMESET, .MSRS-RVC TEXTAREA {
    font-size: 10pt;
    font-family: "Segoe UI","Helvetica Neue", Helvetica, Arial, sans-serif;
}

/* Override default link styling ie. on toolbar links */
.MSRS-RVC .ActiveLink:link,
.MSRS-RVC .ActiveLink:visited {
    color: black;
    text-decoration: none;
}

.MSRS-RVC .ActiveLink:hover,
.MSRS-RVC .ActiveLink:focus,
.MSRS-RVC .ActiveLink:visited:hover,
.MSRS-RVC .ActiveLink:visited:focus {
    color: black;
    text-decoration: underline;
    outline: none;
}

/*
    Wait spinnie
*/

.MSRS-RVC .WaitControlBackground {
    cursor: wait;
    padding: 15px;
    border: 1px solid;
}

.MSRS-RVC .WaitControlBackground:focus {
    outline: none !important;
}

.MSRS-RVC .WaitInfoCell {
    padding-left: 25px;
    padding-right: 25px;
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;
}

.MSRS-RVC .WaitText {
    font-weight: normal;
}

.MSRS-RVC .CancelLinkDiv {
    margin-top: 3px;
}

.MSRS-RVC .CancelLinkText {
    padding: 1px 3px 3px;
    display: inline-block;
}

.MSRS-RVC .CancelLinkText:focus {
    outline: 1px dotted #000;
}

.MSRS-RVC .spinnie {
    position: relative;
    width: 60px;
    height: 60px;
    margin:auto;
    transform: scale(.4);
}

.MSRS-RVC .spinnie .dot {
    position: absolute;
    width: 75px;
    height: 75px;
    opacity: 0;
    transform: rotate(225deg);
    animation: msrs-orbit 6.96s infinite;
}

.MSRS-RVC .spinnie .dot:after{
    content: '';
    display: block;
    width: 10px;
    height: 10px;
    left:0px;
    top:0px;
    border-radius: 10px;
}

.MSRS-RVC .spinnie .dot1 {
    animation-delay: 1.14s;
}

.MSRS-RVC .spinnie .dot2 {
    animation-delay: 0.225s;
}

.MSRS-RVC .spinnie .dot3 {
    animation-delay: 0.4575s;
}

.MSRS-RVC .spinnie .dot4 {
    animation-delay: 0.6825s;
}

.MSRS-RVC .spinnie .dot5 {
    animation-delay: 0.915s;
}

@keyframes msrs-orbit {
    0% {
        opacity: 1;
        z-index:99;
        transform: rotate(180deg);
        animation-timing-function: ease-out;
    }

    7% {
        opacity: 1;
        transform: rotate(300deg);
        animation-timing-function: linear;
        origin:0%;
    }

    30% {
        opacity: 1;
        transform:rotate(410deg);
        animation-timing-function: ease-in-out;
        origin:7%;
    }

    39% {
        opacity: 1;
        transform: rotate(645deg);
        animation-timing-function: linear;
        origin:30%;
    }

    70% {
        opacity: 1;
        transform: rotate(770deg);
        animation-timing-function: ease-out;
        origin:39%;
    }

    75% {
        opacity: 1;
        transform: rotate(900deg);
        animation-timing-function: ease-out;
        origin:70%;
    }

    76% {
    opacity: 0;
        transform:rotate(900deg);
    }

    100% {
    opacity: 0;
        transform: rotate(900deg);
    }
}

/*
    Paramater region
*/

.MSRS-RVC .ParametersFrame {
    border: 1px solid;
}

.MSRS-RVC .InterParamPadding { /* Spacing between param inputs */
    padding-left: 22px;
}

.MSRS-RVC .EmptyDropDown {
    width: 15ex;
}

.MSRS-RVC .SubmitButtonCell {
    border-left: 1px solid #868686;
    align: center;
    text-align: center;
    padding: 10px;
    vertical-align: top;
}

.MSRS-RVC .SubmitButton:focus {
    outline: 1px dotted #000 !important;
}

.MSRS-RVC .ParamLabelCell label,
.MSRS-RVC .ParamEntryCell label {
    vertical-align: middle;
}

.MSRS-RVC .ParamEntryCell input {
    vertical-align: middle;
    padding: 4px;
    border: 1px solid #9E9E9E;
}

.MSRS-RVC td.ParamEntryCell select {
    margin-left: 3px;
    padding: 3px;
    border: 1px solid #9e9e9e;
}

.MSRS-RVC .ParamEntryCell input:disabled {
    opacity: 0.25;
}

.MSRS-RVC .ParamEntryCell input:focus {
    outline: none;
    border-color: #000;
}

.MSRS-RVC .ParametersFrame .glyphui-downarrow {
    margin-left: 4px;
    font-size: 12px;
}

.MSRS-RVC .ParamEntryCell .glyphui {
    display: inline;
    padding: 5px;
}

/*
    Generic toolbar
*/

.MSRS-RVC .ToolBarButtonsCell { /* Basic toolbar icons */
    padding: 0;
    border-bottom: 1px solid;
    border-top: 1px solid;
    border-left: none;
    border-right: none;
}

.MSRS-RVC .ToolbarPageNav input {
    display: inline;
    margin: 4px;
    padding: 1px;
}

.MSRS-RVC .ToolbarFind,
.MSRS-RVC .ToolbarZoom {
    display: inline;
    padding-top: 10px;
    padding-left: 16px;
    padding-right: 16px;
}

.MSRS-RVC .ToolbarExport.WidgetSet:hover,
.MSRS-RVC .ToolbarRefresh.WidgetSet:hover,
.MSRS-RVC .ToolbarPrint.WidgetSet:hover,
.MSRS-RVC .ToolbarBack.WidgetSet:hover,
.MSRS-RVC .ToolbarPageNav.WidgetSet .HoverButton:hover,
.MSRS-RVC .ToolbarPowerBI.WidgetSet:hover {
    cursor: pointer;
}

.MSRS-RVC .ToolbarExport.WidgetSet,
.MSRS-RVC .ToolbarFind.WidgetSet,
.MSRS-RVC .ToolbarZoom.WidgetSet,
.MSRS-RVC .ToolbarPageNav.WidgetSet,
.MSRS-RVC .ToolbarRefresh.WidgetSet,
.MSRS-RVC .ToolbarPrint.WidgetSet,
.MSRS-RVC .ToolbarBack.WidgetSet,
.MSRS-RVC .ToolbarPowerBI.WidgetSet {
    border-width: 0 1px 0 0;
    border-style: solid;
}

.MSRS-RVC .ToolbarPageNav.WidgetSet input, .MSRS-RVC .ToolbarFind.WidgetSet input {
    border: 1px solid silver;
    line-height: normal;
}

.MSRS-RVC .ToolbarZoom.WidgetSet select {
    border: 1px solid silver;
    line-height: normal;
    position: relative;
    top: -1px;
}

.MSRS-RVC .ToolbarPageNav.WidgetSet input:focus, .MSRS-RVC .ToolbarFind.WidgetSet input:focus,
.MSRS-RVC .ToolbarZoom.WidgetSet select:focus {
    outline: none;
    border-color: #000;
}

.MSRS-RVC .ToolbarRefresh.WidgetSet,
.MSRS-RVC .ToolbarPrint.WidgetSet,
.MSRS-RVC .ToolbarBack.WidgetSet,
.MSRS-RVC .ToolbarPowerBI.WidgetSet {
    height: 46px;
    width: 56px;
}

.MSRS-RVC .ShowHideParametersGroup {
    padding-right: 4px;
}

.MSRS-RVC .ToolbarFind .InterWidgetGroup,
.MSRS-RVC .ToolbarPageNav .InterWidgetGroup {
    padding-right: 4px;
}

.MSRS-RVC .DisabledLink {
    color: #212121;
    text-decoration: none;
    cursor: default;
}

.MSRS-RVC .DisabledLink:hover {
    color: gray;
    text-decoration: none;
    cursor: default;
}

.MSRS-RVC .ImageWidget {
    height: 16px;
    width: 16px;
    margin: 0;
}

.MSRS-RVC .DisabledTextBox {
    background-color: #FFFFFF;
}

.MSRS-RVC .WidgetSet {
    height: 46px;
    text-align:center;
}

.MSRS-RVC .WidgetSetSpacer {
    padding-right: 20px;
}

.MSRS-RVC .HoverButton {
    height:46px;
    cursor: pointer;
    border: 0;
    padding: 0;
    margin: 0;
}

.MSRS-RVC .NormalButton {
    height:46px;
    cursor: pointer;
}

.MSRS-RVC .NormalButton:focus {
    outline: 1px dotted #000 !important;
}

.MSRS-RVC .NormalButton table,
.MSRS-RVC .HoverButton table,
.MSRS-RVC .aspNetDisabled table {
    width: 56px;
    height: 100%;
}

.MSRS-RVC .DisabledButton {
    height:46px;
    cursor: not-allowed;
}

/*
    Export drop down
*/

.MSRS-RVC .ToolbarExport,
.MSRS-RVC .ToolbarExport table {
    width: 80px; /* Width of the Export button */
    height: 100%;
}

.MSRS-RVC .ToolbarExport .ExportLink {
    text-decoration: none; /* This fixes Safari to not show an underline */
    display: block;
    padding: 13px 0 12px;
}

.MSRS-RVC .ToolbarExport .ExportLink:focus {
    outline: 1px dotted #000 !important;
}

.MSRS-RVC .ToolbarExport .glyphui-save {
    margin-right: 0px;
}

.MSRS-RVC .ToolbarExport .glyphui-downarrow {
    margin-left: 8px;
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd {
    width: 200px; /* Width of the Export drop down */
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd .DisabledButton,
.MSRS-RVC .ToolbarExport .MenuBarBkGnd .HoverButton {
    text-align: left; /* Override the default center alignment of toolbar content */
    overflow: hidden;
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd .DisabledButton > a,
.MSRS-RVC .ToolbarExport .MenuBarBkGnd .HoverButton > a {
    display: block;
    padding: 14px 18px;
    white-space: nowrap;
    text-decoration: none;
    text-overflow: ellipsis;
    overflow: hidden;
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd .HoverButton {
    cursor: pointer;
    outline: 1px #000;
    border-style: dotted;
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd div:first-of-type {
    border-width: 1px 1px 1px 1px; /* The first export menu drop down needs to specify a top border */
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd div { /* Border of items in the drop down menu */
    border-width: 0 1px 1px 1px;
    border-style: solid;
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd div:nth-last-of-type(1) {
    border-width: 0; /* The last export menu doesn't need to specify a border */
}

.MSRS-RVC .ToolbarExport .MenuBarBkGnd .HoverButton,
.MSRS-RVC .ToolbarExport .MenuBarBkGnd .NormalButton:focus { /* Hover effect on drop down menu items */
    background-color: #F4F4F4;
}

/*
    Document map
*/

.MSRS-RVC .DocMapFrame,
.MSRS-RVC .DocMapTitle {
    border-bottom: 1px solid; /* Border of the document map region */
}

.MSRS-RVC .DocMapBar { /* Sizing of the document map title */
    padding-right: 10px;
    padding-left: 10px;
    height: 28px;
    line-height: 28px;
}

.MSRS-RVC .DocMapContentCell > div > div div { /* Doc map entry */
    margin-top: 6px;
}

.MSRS-RVC .DocMapContentCell  a span {
    padding: 3px;
}

.MSRS-RVC .ToolbarDocMapToggle {
    display: inline;
}

.MSRS-RVC .DocMapFrame a {
    color: black;
}

.MSRS-RVC .AccessibleOffScreen {
    position: absolute;
    left: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
}