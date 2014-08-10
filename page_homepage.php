<?php
/**
 * Template Name: Homepage
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 */

//Get the header(s)
get_template_parts( array( 'parts/html-header', 'parts/header' ) );

if ( have_posts() ) while ( have_posts() ) : the_post();
 ?>


<!-- Content Begins Here -->
<div class="container content">

    <!-- Skills sub-section begins here -->
    <div class="sub-container-half skills">
        <div class="section-title-half">
            <h2>Skills</h2>
            <div class="title-bar title-skills"></div>
        </div>
            <ul class="skill-list">
                <li class="whole-bar"><h3 class="bar grey skill-pm">Project Management</h3></li>
                <li class="whole-bar"><h3 class="bar green skill-html">HTML</h3></li>
                <li class="whole-bar"><h3 class="bar grey skill-css">CSS</h3></li>
                <li class="whole-bar"><h3 class="bar green skill-require">Requirements Engineering</h3></li>
                <li class="whole-bar"><h3 class="bar grey skill-sql">SQL</h3></li>
                <li class="whole-bar"><h3 class="bar green skill-php">PHP</h3></li>
                <li class="whole-bar"><h3 class="bar grey skill-net">Networking</h3></li>
                <li class="whole-bar"><h3 class="bar green skill-email">Email Marketing</h3></li>
                <li class="whole-bar"><h3 class="bar grey skill-oo">Object Oriented</h3></li>
                <li class="whole-bar"><h3 class="bar green skill-office">Office</h3></li>
            </ul>
    </div>
    <!-- Skills sub-section ends here -->

    <!-- Education sub-section begins here -->
    <div class="sub-container-half education" id="education">
        <div class="section-title-half">
            <h2>Education</h2>
            <div class="title-bar title-education"></div>
        </div>
        
        <!-- Degree details section begins here -->
        <div class="uni">
            <a class="edu-logo" href="http://www.shu.ac.uk/" target="_blank">
                <img class="edu-logo" height="59" width="110" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-shu.png" alt="Sheffield Hallam University logo">
            </a>
            <div class="date box">SEP 2011 - PRESENT</div>
            <strong class="level">Degree</strong>
            <h3 class="course"><span>BSc Computing - 3rd Year (placement)</span></h3>
            <span class="course-year">2nd Year Modules: <strong>76%</strong></span>
            <ul class="modules">
                <li>Object Oriented Analysis, Design & Implementation - <strong>95%</strong></li>
                <li>Cisco CCNA Network Fundamentals - <strong>78%</strong></li>
                <li>Web Architectures - <strong>78%</strong></li>
                <li>Database Systems - <strong>69%</strong></li>
                <li>E-Business - <strong>69%</strong></li>
                <li>Project Management & Career Development - <strong>68%</strong></li>
            </ul>
            <span class="course-year">1st Year Modules: <strong>76%</strong></span>
            <ul class="modules">
                <li>Programming for Computing - <strong>90%</strong></li>
                <li>Cisco Technology Essentials - <strong>83%</strong></li>
                <li>Mathematics for Computing - <strong>81%</strong></li>
                <li>Information Systems - <strong>70%</strong></li>
                <li>Web Design & Development  - <strong>68%</strong></li>
                <li>Professionalism & Communication Skills - <strong>64%</strong></li>
            </ul>
        </div>
        <!-- Degree details section ends here -->

        <!-- A-levels details section begins here -->
        <div class="sixth">
            <a class="edu-logo" href="http://www.ccs.northants.sch.uk/" target="_blank">
                <img height="67" width="126" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-ccs.png" alt="Caroline Chisholm School logo">   
            </a>
            <div class="date box">SEP 2009 - JUL 2011</div>
            <strong class="level">A Level</strong>
            <ul class="modules">
                <li>Mathematics</li>
                <li>Computing</li>
                <li>Business Studies</li>
            </ul>
        </div>
        <!-- A-levels details section ends here -->

        <!-- GCSE details section begins here -->
        <div class="secondary">
            <a class="edu-logo" href="http://www.sponne.org.uk/" target="_blank">
                <img height="49" width="160" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-sponne.png" alt="Caroline Chisholm School logo">
            </a>  
            <div class="date box">SEP 2005 - JUL 2009</div>
            <strong class="level">GCSE</strong>
            <ul class="modules">
                <li>12 x <strong>A* - C</strong> GCSE’s awarded including Mathematics and English.</li>
            </ul>
        </div>
        <!-- GCSE details section ends here -->

    </div>
    <!-- Education sub-section ends here -->

    <!-- Work Experience sub-section begins here -->
    <div class="sub-container-full work">
        <div class="section-title-full">
            <h2>Work Experience</h2>
            <div class="title-bar title-work"></div>
        </div>
            <div class="company">
                <a class="work-logo" href="http://www.teradata.co.uk/" target="_blank">
                    <img height="42" width="175" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-teradata.png">
                </a>
                <div class="role-date">
                    <h3 class="role box">Project Management Assistant</h3>
                    <div class="date box">JUL 2013 - PRESENT</div>
                </div>
                <div class="description">
                    <p>I am currently working for Teradata Applicatons as a Project Management Assistant. I am working as placement student as part of a 12 month internship. The placement has taught me vital project management skills and also allowed me incredible exposure to the digital marketing industry. I have learnt first hand the importance of:</p>
                    <ul class="desc-list">
                        <li>Accurate project scoping</li>
                        <li>Strong client relationships and interation</li>
                        <li>Expectation management</li>
                        <li>Resource management</li>
                    </ul>
                    <p>The role has been particularly beneficial in enhancing my knowledge of how tasks move around the various departments of a business, and how project managerial styles such as PRINCE2 and AGILE can offer both advantages and disadvantages to different kinds of projects.</p>
                </div>
            </div>
            <div class="company">
                <a class="work-logo" href="http://www.northamptongeneral.nhs.uk/" target="_blank">
                    <img height="70" width="175" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-nhs.png">
                </a>
                <div class="role-date">
                    <h3 class="role box">Ward Host</h3>
                    <div class="date box">JAN 2010 - PRESENT</div>
                </div>
                <div class="description">
                    <p>I worked at Northampton General Hospital part time for three years. Each shift I was responsible for managing a ward’s food and beverages. The role required to communicate with patients to offer different foods and work out what variety of meals a patient would like to eat, as well as at the same time taking into account special dietary requirements of the individual.</p>
                    <p>During my time at NGH, the Trust has offered training opportunities to me in order to increase my working performance and knowledge. I have completed training courses in Conflict Resolution, Infection Control and Ethnicity & Diversity.</p>
                </div>
            </div>
    </div>
    <!-- Work Experience sub-section ends here -->

    <!-- Achievements sub-section begins here -->
    <div class="sub-container-half achievements">
        <div class="section-title-half">
            <h2>Achievements</h2>
            <div class="title-bar title-achievements"></div>
        </div>
        <ul class="bullet-points">
            <li class="cisco">Cisco Accreditation</li>
            <li class="office">Microsoft Certification</li>
            <li class="dofe">Duke of Edinburgh's Award</li>
            <li class="guitar">Guitar</li>
            <li class="drive">4 years driving - no points</li>
        </ul>
    </div>
    <!-- Achievements sub-section ends here -->

    <!-- Interests sub-section begins here -->
    <div class="sub-container-half interests">
        <div class="section-title-half">
            <h2>Interests</h2>
            <div class="title-bar title-interests"></div>
        </div>
        <ul class="bullet-points">
            <li class="squash">Squash</li>
            <li class="gym">Regular member of gym</li>
            <li class="tech">Technology</li>
        </ul>
    </div>
    <!-- Interests sub-section ends here -->

</div>
<!-- Content ends here -->

<?php  endwhile;
 //Get the footer(s)
get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>