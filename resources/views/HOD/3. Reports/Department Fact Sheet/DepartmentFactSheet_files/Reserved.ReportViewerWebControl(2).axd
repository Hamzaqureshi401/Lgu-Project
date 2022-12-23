//----------------------------------------------------------------------------
// Copyright (c) Microsoft Corporation. All rights reserved.
//----------------------------------------------------------------------------

function ResizeVerticalTextBoxes(selector) {
    if (window.$RSjQuery) {
        selector = selector ? selector : "";
        window.$RSjQuery(selector + ".canGrowVerticalTextBox").each(function() {
            var node = window.$RSjQuery(this);
            var child = node.children(":first");
            var td = node.parent();
            
            if (child.width() > node.width())
            {
                td.width(child.outerWidth());
                node.width(child.outerWidth());
            }
            else if (!node.hasClass("canShrinkVerticalTextBox"))
            {
                child.outerWidth(node.width());
            }
        });
        
        window.$RSjQuery(selector + ".canShrinkVerticalTextBox").each(function() {
            var node = window.$RSjQuery(this);
            var child = node.children(":first");
            var td = node.parent();
            
            if (child.width() < node.width())
            {
                td.width(child.outerWidth());
                node.width(child.outerWidth());
            }
            else
            {
                child.outerWidth(node.width());
            }
        });
    }
}

function ResizeTablixRows() {
    if (window.$RSjQuery) {
        MarkCanGrowRows();
        MarkCanShrinkRows();

        // Fix for slow code...
        // The original code here was querying the child and node height and setting the grandparent height in the same iteration.
        // This caused a layout reflow to occur with every iteration. Which was slow. 
        // The fix breaks the two operations apart so the layout reflow does not occur. 

        window.$RSjQuery(".cannotGrowTextBoxInTablix")
            .map(getLargerCells)
            .each(function (i, e) { e.css('height', ''); });
    }

    function getLargerCells() {
        var node = window.$RSjQuery(this).children().first();
        var cell = node.closest('td.tdResizable').children().first();

        // Fix for Vertical Alignment not working when a tablix row contains a mix of CanGrow and CannotGrow
        // - node.height represents the height of the row after others have grown.
        // - childHeight represents the height that the text wants to achieve.
        // If the height that the child wants to achieve is smaller than the height of the row, we will take off 
        // the original height of the grandparent to allow vertical alignment.
        if (cell.length && node.length && cell.height() > node.height()) {
            return cell;
        } else {
            return null;
        }
    }
}

function MarkCanGrowRows() {
    if (window.$RSjQuery) {
        if (window.$RSjQuery(".cannotGrowTextBoxInTablix").length === 0 || window.$RSjQuery(".canGrowTextBoxInTablix").length === 0)
        {
            return;
        }

        window.$RSjQuery("tr > td > .canGrowTextBoxInTablix").parent().parent().each(function() {
            var row = window.$RSjQuery(this);
            if (row.find('.canGrowTextBoxInTablix').length === 0 || row.find('.cannotGrowTextBoxInTablix').length === 0)
            {
                return; //continue;
            }
            else
            {
                var parentTable = row.closest("table").first();
                row.find('.cannotGrowTextBoxInTablix').each(function () {
                    // Leave out nested tables (compare their class attributes to make sure we are in the current table)
                    if (window.$RSjQuery(this).closest("table").first().attr('class') === parentTable.attr('class')) {
                        window.$RSjQuery(this).closest("td").addClass("tdResizable");
                    }
                });
            }
        });
    }
}

function MarkCanShrinkRows() {
    if (window.$RSjQuery) {
        if (window.$RSjQuery(".canShrinkTextBoxInTablix").length === 0)
        {
            return;
        }
        
        window.$RSjQuery("tr > td > .canShrinkTextBoxInTablix").parent().parent().each(function() {
            var row = window.$RSjQuery(this);
            if (row.find(".canShrinkTextBoxInTablix").length === 0)
            {
                return; //continue;
            }
            else if (row.find(".cannotShrinkTextBoxInTablix").length === 0) {
                row.find('td').each(function() {
                    window.$RSjQuery(this).addClass("tdResizable");
                });
            }
        });
    }
}

function Resize100HeightElements() {
    if (window.$RSjQuery) {
        var parentHeights = [];
        var index = 0;
        var elementsToResize = window.$RSjQuery(".resize100Height");

        // Separating measuring from updating as doing them together causes layout trashing, slowing down perf
        elementsToResize.each(function () {
            var self = window.$RSjQuery(this);
            var parent = self.parent();
            // if parent is set to resize as well then child should reuse parent's sizing
            var parentHeight = parent.hasClass("resize100Height") ? parentHeights[index - 1] : parent.height();
            while (!(parent.is("div") || parent.is("td") || parent.is("tr")) || parentHeight === 0) {
                parent = parent.parent();
                parentHeight = parent.hasClass("resize100Height") ? parentHeights[index - 1] : parent.height();
            }
            parentHeights[index++] = parentHeight;
        });

        index = 0;
        elementsToResize.each(function() {
            var self = window.$RSjQuery(this);
            self.height(parentHeights[index++]);
        });
    }
}

function Resize100WidthElements() {
    if (window.$RSjQuery) {
        var parentWidths = [];
        var index = 0;
        var elementsToResize = window.$RSjQuery(".resize100Width");
        // Separating measuring from updating as doing them together causes layout trashing, slowing down perf
        elementsToResize.each(function () {
            var self = window.$RSjQuery(this);
            var parent = self.parent();
            // if parent is set to resize as well then child should reuse parent's sizing
            var parentWidth = parent.hasClass("resize100Width") ? parentWidths[index - 1] : parent.width();
            while (!(parent.is("div") || parent.is("td") || parent.is("tr")) || parentWidth === 0) {
                parent = parent.parent();
                parentWidth = parent.hasClass("resize100Width") ? parentWidths[index - 1] : parent.width();
            }
            parentWidths[index++] = parentWidth;
        });

        index = 0;
        elementsToResize.each(function() {
            var self = window.$RSjQuery(this);
            self.width(parentWidths[index++]);
        });
    }
}

function SetFocusOnReport(event) {
    if (event.data == 'SetFocusOnContent') {
        // Look for RVC from portal and from Sharepoint
        var reportViewer = window.$RSjQuery('div[id^="VisibleReportContentReportViewerControl_"],td[id^="m_sqlRsWebPartViewerCell"]');
        reportViewer.attr("tabindex", 1);
        reportViewer.focus();
        reportViewer.removeAttr("tabindex");
    }
}

window.addEventListener('message', SetFocusOnReport, false);

function PostRenderActions() {
    Resize100HeightElements();
    Resize100WidthElements();
    ResizeVerticalTextBoxes();
    ResizeTablixRows();
}

// Note: Make sure this script follow RVC jquery in script registration.
window.$RSjQuery = window.jQuery.noConflict(true);
