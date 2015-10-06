<style>

    .ce-banner{
        width:98%;
        padding: 8px 1%;
        text-align: center;
        font-size: 12px;
        transition-property: all;
        transition-duration: .5s;
        transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        z-index: 100000;
        position:fixed;
    }

    .ce-banner.cookie__closed{
        height:0;
        overflow: hidden;
        padding: 0;
    }

    .ce-banner a{
        text-decoration: none;
        font-style: italic;
    }

    .ce-banner a.ce-accept{
        text-decoration: none;
        display: inline-block;
        padding: 3px 10px;
        font-weight: normal;
        line-height: 18px;
        margin: 5px 0;
        font-style: normal;
    }

    .cookie__overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index:1499;
    }
    .cookie__overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .cookie__popup {
        margin: 4% auto;
        padding: 4% 2% 4% 2%;
        background: #fff;
        width: 80%;
        position: relative;
        transition: all 5s ease-in-out;
        z-index: 1500;
        text-align: left;
        max-height: 78%;
        overflow-y: auto;
    }

    .cookie__popup .cookie__h2 {
        margin-top: 0;
        margin-bottom: 10px;
        color: #333;
        text-transform: uppercase;
        font-size: 20px;
    }
    .cookie__popup .cookie__close {
        position: absolute;
        top: 10px;
        right: 15px;
        transition: all 200ms;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
        padding: 3px 8px;
        display: inline-block;
        border: 3px solid #333;
    }
    .cookie__popup .cookie__close:hover {
        opacity:0.8;
    }
    .cookie__popup .cookie__content {
        max-height: 30%;
        overflow: auto;
        color:#333 !important;
        font-weight:normal;
        font-size:14px;

    }

    .cookie__content .cookie__title{
        font-size: 18px !important;
        margin: 10px 0 5px 0 !important;
        padding: 0 !important;
        text-transform: uppercase !important;
        font-weight: bold !important;
    }

    .cookie__content .cookie__par{
        margin: 3px 0 !important;
    }

    .cookie__content a{
        color: #c40011 !important;
        text-decoration: none !important;
    }

    .cookie__list{
        display:none;
    }
</style>