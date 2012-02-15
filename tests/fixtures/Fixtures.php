<?php

class Fixtures
{
    static public $project = array(
        'id' => 1,
        'title' => 'ProjectTitle',
        'summary' => 'ProjectSummary',
        'image' => 'project.png',
        'image_source' => 'ImageSource',
        'description' => 'project description'
    );

    static public $videoResource = array(
        'id' => 23,
        'title' => 'Jeremy Mathis. Ocean Acidification: What It Means to Alaska',
        'createdate' => '2010-03-23',
        'summary' => 'Jeremy Mathis, Professor, School of Fisheries and Ocean Sciences, University of Alaska Fairbanks↵↵Since the Industrial Revolution approximately 1/3 of all human CO2 emissions have been absorbed by the ocean. While this process has mitigated global temperature increases it has had a profound effect on the chemistry of the surface ocean, making the water more acidic. This phenomenon is exacerbated in the cold, highly productive waters in the continental shelf seas surrounding Alaska. Recent observations have shown that the bottom waters over the shelves of the Chukchi and Bering Seas, as well has the Gulf of Alaska become undersaturated with respect to aragonite in late summer and fall. These undersaturated waters could be corrosive to shell building organisms such as clams, oysters, and crabs. Here, the controls and seasonal distribution of ocean acidification around Alaska will be discussed in the context of the import commercial fisheries.↵↵Presentation/Slides are available here: <a href="http://ine.uaf.edu/accap/documents/2010_03_OceanAcidification_Mathis.pdf">http://ine.uaf.edu/accap/documents/2010_03_OceanAcidification_Mathis.pdf</a>',
        'updatedate' => NULL,
        'type' => 4,
        'accap' => 1,
        'fsc' => 1,
        'snap' => 1
    );

    static public $vimeoVideoProps = array(
        'id' => 15,
        'source_type' => 'vimeo',
        'embedded_url' => 'http://vimeo.com/31989085',
        'embedded_title' => 'Jeremy Mathis. Ocean Acidification: What It Means to Alaska',
        'embedded_user_url' => 'http://vimeo.com/snapandaccap',
        'embedded_user' => 'snapandaccap',
    );

    static public $youtubeVideoProps = array(
        'id' => 15,
        'source_type' => 'youtube',
        'embedded_url' => 'h0JREVf8iDc',
        'embedded_title' => 'Fire In Alaska',
        'embedded_user_url' => '',
        'embedded_user' => '',
    );

    static public $resources = array(
        1 => array(
            "id" => 1,
            "title" => "Sensitivity of Simulated Boreal Fire Dynamics to Uncertainties in Climate Drivers",
            "createdate" => '2009-06-08',
            "summary" => "This paper uses a transient landscape-level model of vegetation dynamics, Alaskan Frame-based Ecosystem Code (ALFRESCO), to evaluate the influence of different driving datasets of climate on simulation results. The results of this study identify the importance of conducting retrospective analyses prior to coupling ecological models of fire dynamics with climate system models.",
            "updatedate" => '2009-06-08',
            "type" => 1,
            "accap" => 0,
            "fsc" => 0,
            "snap" => 0
        ),
        10 => array(
            "id" => 10,
            "title" => "Reports for Boreal ALFRESCO",
            "createdate" => '2008-10-22',
            "summary" => "As Boreal ALFRESCO finishes modeling specific areas in Alaska, reports will be posted here to download. These reports focus on particular domains within the state and present maps, data, and other interpretations of model output. ",
            "updatedate" => '2010-11-19',
            "type" => 2,
            "accap" => 0,
            "fsc" => 0,
            "snap" => 0
        ),
        11 => array(
            "id" => 11,
            "title" => "An Overview of ALFRESCO",
            "createdate" => '2009-06-08',
            "summary" => "This presentation gives a brief overview of the Alaska Frame-based Ecosystem COde (ALFRESCO) model, which is used to simulate fire and post-fire vegetation transitions on the landscape in Interior Alaska.",
            "updatedate" => '2009-06-08',
            "type" => 3,
            "accap" => 0,
            "fsc" => 0,
            "snap" => 0
        ),
        15 => array(
            "id" => 15,
            "format" => NULL,
            "title" => "Introduction to SNAP",
            "createdate" => '2020-11-03',
            "summary" => "Dr. Scott Rupp introduces the Scenarios Network for Alaska &amp; Arctic Planning in this short video",
            "updatedate" => NULL,
            "type" => 4,
            "accap" => 0,
            "fsc" => 0,
            "snap" => 0
        ),
    );

    static public $resourceSummaries = array(
        1 => <<<html
<div id="pub_box_1" class="resource">
    <div id="pub_hover_1" class="hover_box">
        <div style="position: relative; ">
            <div style="position: absolute; ">
                <img alt="Report" src="images/pub_report.png" style="margin-left: 5px;" />
            </div>
            <div style="position: relative; left: 59px; width: 380px;">
                <div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" >
                    <a href="resource_page.php?resourceid=1">Sensitivity of Simulated Boreal Fire Dynamics to Uncertainties in Climate Drivers</a>
                </div>
                <div style="position: relative; width: 420px; margin-bottom: 10px;"><!-- no-op lint --></div><div style="color: #666;">Tags: ALFRESCO, ecosystem change</div>
            </div>
        </div>
    <div style="margin-top: 10px;width: 420px; padding: 10px;">This paper uses a transient landscape-level model of vegetation dynamics, Alaskan Frame-based Ecosystem Code (ALFRESCO), to evaluate the influence of different driving datasets of climate on simulation results. The results of this study identify the importance of conducting retrospective analyses prior to coupling ecological models of fire dynamics with climate system models.</div>
    <div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;">
        <a id="pub_close_1" style="cursor: pointer; cursor: hand;">close &#8855;</a>
    </div>
</div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;">
    <img alt="Report" src="images/pub_report.png" style="" />
</div>
<div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;">
    <div style="font-size: 15px; color: #111111; margin-bottom: 5px;" >
        <a href="resource_page.php?resourceid=1">Sensitivity of Simulated Boreal Fire Dynamics to Uncertainties in Climate Drivers</a>
    </div>
</div>
<script type="text/javascript">
var config = { 
    over: function()
        {
            $('#pub_hover_1').fadeIn(300);
        },
    interval: 100,
    out: function() 
        { 
            $('#pub_hover_1').hide(0); 
        } 
};
$('#pub_box_1').hoverIntent(config);
$('#pub_close_1').click( function()
    { 
        $('#pub_hover_1').hide(0);
    }
);
</script>
</div>
html
,   10 => <<<html
<div id="pub_box_10" class="resource">
    <div id="pub_hover_10" class="hover_box">
        <div style="position: relative; ">
            <div style="position: absolute; ">
                <img alt="Paper" src="images/pub_paper.png" style="margin-left: 5px;" />
            </div>
            <div style="position: relative; left: 59px; width: 380px;">
                <div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" >
                    <a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a>
                </div>
                <div style="position: relative; width: 420px; margin-bottom: 10px;"><!-- no-op lint --></div><div style="color: #666;">Tags: ecological model</div>
            </div>
        </div>
    <div style="margin-top: 10px;width: 420px; padding: 10px;">As Boreal ALFRESCO finishes modeling specific areas in Alaska, reports will be posted here to download. These reports focus on particular domains within the state and present maps, data, and other interpretations of model output. </div>
    <div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;">
        <a id="pub_close_10" style="cursor: pointer; cursor: hand;">close &#8855;</a>
    </div>
</div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;">
    <img alt="Paper" src="images/pub_paper.png" style="" />
</div>
<div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;">
    <div style="font-size: 15px; color: #111111; margin-bottom: 5px;" >
        <a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a>
    </div>
</div>
<script type="text/javascript">
var config = { 
    over: function()
        {
            $('#pub_hover_10').fadeIn(300);
        },
    interval: 100,
    out: function() 
        { 
            $('#pub_hover_10').hide(0); 
        } 
};
$('#pub_box_10').hoverIntent(config);
$('#pub_close_10').click( function()
    { 
        $('#pub_hover_10').hide(0);
    }
);
</script>
</div>
html
,   11 => <<<html
<div id="pub_box_11" class="resource">
    <div id="pub_hover_11" class="hover_box">
        <div style="position: relative; ">
            <div style="position: absolute; ">
                <img alt="Presentation" src="images/pub_presentation.png" style="margin-left: 5px;" />
            </div>
            <div style="position: relative; left: 59px; width: 380px;">
                <div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" >
                    <a href="resource_page.php?resourceid=11">An Overview of ALFRESCO</a>
                </div>
                <div style="position: relative; width: 420px; margin-bottom: 10px;"><!-- no-op lint --></div><div style="color: #666;">Tags: ALFRESCO, ecosystem change, fire</div>
            </div>
        </div>
    <div style="margin-top: 10px;width: 420px; padding: 10px;">This presentation gives a brief overview of the Alaska Frame-based Ecosystem COde (ALFRESCO) model, which is used to simulate fire and post-fire vegetation transitions on the landscape in Interior Alaska.</div>
    <div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;">
        <a id="pub_close_11" style="cursor: pointer; cursor: hand;">close &#8855;</a>
    </div>
</div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;">
    <img alt="Presentation" src="images/pub_presentation.png" style="" />
</div>
<div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;">
    <div style="font-size: 15px; color: #111111; margin-bottom: 5px;" >
        <a href="resource_page.php?resourceid=11">An Overview of ALFRESCO</a>
    </div>
</div>
<script type="text/javascript">
var config = { 
    over: function()
        {
            $('#pub_hover_11').fadeIn(300);
        },
    interval: 100,
    out: function() 
        { 
            $('#pub_hover_11').hide(0); 
        } 
};
$('#pub_box_11').hoverIntent(config);
$('#pub_close_11').click( function()
    { 
        $('#pub_hover_11').hide(0);
    }
);
</script>
</div>
html
,   15 => <<<html
<div id="pub_box_15" class="resource">
    <div id="pub_hover_15" class="hover_box">
        <div style="position: relative; ">
            <div style="position: absolute; ">
                <img alt="Video" src="images/pub_video.png" style="margin-left: 5px;" />
            </div>
            <div style="position: relative; left: 59px; width: 380px;">
                <div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" >
                    <a href="resource_page.php?resourceid=15">Introduction to SNAP</a>
                </div>
                <div style="position: relative; width: 420px; margin-bottom: 10px;"><!-- no-op lint --></div>
            </div>
        </div>
    <div style="margin-top: 10px;width: 420px; padding: 10px;">Dr. Scott Rupp introduces the Scenarios Network for Alaska &amp; Arctic Planning in this short video</div>
    <div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;">
        <a id="pub_close_15" style="cursor: pointer; cursor: hand;">close &#8855;</a>
    </div>
</div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;">
    <img alt="Video" src="images/pub_video.png" style="" />
</div>
<div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;">
    <div style="font-size: 15px; color: #111111; margin-bottom: 5px;" >
        <a href="resource_page.php?resourceid=15">Introduction to SNAP</a>
    </div>
</div>
<script type="text/javascript">
var config = { 
    over: function()
        {
            $('#pub_hover_15').fadeIn(300);
        },
    interval: 100,
    out: function() 
        { 
            $('#pub_hover_15').hide(0); 
        } 
};
$('#pub_box_15').hoverIntent(config);
$('#pub_close_15').click( function()
    { 
        $('#pub_hover_15').hide(0);
    }
);
</script>
</div>
html
);

}

?>
