<?php 
include 'template.php';
$page = new webPage('SNAP: About', '', 'about');
$page->openPage();
$page->pageHeader();
?>
        <div id="main_body">

            <div id="main_content" >
                <div class="subHeader">About</div>
                <div id="aboutContent" >
                    <img alt="Denali Building" src="images/SNAPbuilding.jpg" style="margin-right: 15px; width: 400px; float: left;" />
                    <p>SNAP’s diverse team works on a wide array of projects at our College Road office – and further afield, too. From the start, much of the work behind SNAP’s products has taken place far from our headquarters at the University of Alaska Fairbanks (UAF).  We rely on the expertise of scientists throughout the UA system, as well as researchers at state and federal agencies and non-profits. Our data are derived from climate models created at scientific centers around the world, and we benefit from the input of individuals at the local and community level.</p>
                    <p>Climate change planning is not a single field of endeavor. It encompasses atmospheric and geophysical sciences, biological sciences, and social sciences. Weighing choices often requires expertise in economics, or knowledge of cultural preferences. SNAP’s work philosophy embraces interdisciplinary collaboration. Academic environments too often foster a competitive approach to research, which stymies collaboration, and leads to inefficiency and redundancy. Government and private organizations can also suffer from poor data sharing. We make all our methods and results as transparent as possible.</p>
                    <img alt="Front Desk" src="images/SNAPbusyoffice.jpg" style="margin-left: 15px; width: 300px; float: right;" />
                    <p>The idea of developing a scenario planning process for Alaska emerged in 2006 from discussions by an interdisciplinary group of about a dozen faculty members at the University of Alaska. The consensus of that group was that such a process would be feasible and would be one of the most useful ways that University of Alaska researchers could convey the societal significance of their research to Alaskan decision-makers and other stakeholders.  Understanding current and future trajectories of climate and other variables helps to develop credible projections which advise policy and management across Alaska and the Arctic.</p>
                    <p>SNAP was launched in 2007, with Dr. Scott Rupp as Network Director, and a three-person staff. In the past four years, SNAP has grown from a single-room effort to a bustling office of over 30 researchers, programmers, students and staff.</p>
                    <p></p>
                </div>
            </div>
        </div>
<?php
$page->closePage();
?>