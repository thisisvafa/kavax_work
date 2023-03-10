@extends('layouts.site.master')@section('page-title', 'Privacy Policy')
@section('page-style', 'other-page/other-page.min.css')

@section('seo-meta')
<meta name="description" content="Privacy Policy">
<meta name="keywords" content="Kavax, kavax, Privacy Policy">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Kavax - Privacy Policy | A creative web design and branding agency based in London" />
<meta property="og:description" content="Privacy Policy | A creative web design and branding agency based in London" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Kavax - Privacy Policy | A creative web design and branding agency based in London" />
<meta property="og:image" content="{{ asset('assets/site/images/base/intro/darkN.jpg') }}" />
@endsection

@section('content')
<!-- Intro Section -->
<section class="intro-section">
    <div class="section-bg">
        <img class="shape" src="{{ asset('assets/site/images/base') }}/heading-bg-shape.png" alt="A young diverse team of digital experts">
        <img class="bg-img" src="{{ asset('assets/site/images/base') }}/header-image/contact-us.png" alt="A young diverse team of digital experts">
    </div>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-8 col-12">
                    <div class="breadcrumb-block">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Privacy Policy</li>
                        </ul>
                    </div>
                    <div class="title-heading">Our privacy policy</div>
                    <div class="section-text">We take your data seriously. We've listed exactly how we handle your
                        data below.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section class="privacy-section gradient-page">
    <div class="container">
        <p>
            Privacy Policy
            <br />
            Effective date: August 16, 2018
            <br /><br />
            Make Agency Limited (???us???, ???we???, or ???our???) operates makeagency.co.uk website (the ???Service???).
            <br /><br />
            This page informs you of our policies regarding the collection, use, and disclosure of personal data
            when you use our Service and the choices you have associated with that data.
            <br /><br />
            We use your data to provide and improve the Service. By using the Service, you agree to the collection
            and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy,
            terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from
            www.makeagency.co.uk
        </p>
        <h2 class="mt-110px">Information Collection And Use</h2>
        <p class="mt-36px">
            We collect several different types of information for various purposes to provide and improve our
            Service to you.
        </p>
        <p class="font-weight-normal color-white mt-36px">
            Types of Data Collected
        </p>
        <h3 class="mt-48px">Personal Data</h3>
        <p>
            While using our Service, we may ask you to provide us with certain personally identifiable information
            that can be used to contact or identify you (???Personal Data???). Personally identifiable information may
            include, but is not limited to:
        </p>
        <ul>
            <li>Email address</li>
            <li>First name and last name</li>
            <li>Phone number</li>
            <li>Cookies and Usage Data</li>
            <li>Usage Data</li>
        </ul>
        <p>
            We may also collect information how the Service is accessed and used (???Usage Data???). This Usage Data may
            include information such as your computer???s Internet Protocol address (e.g. IP address), browser type,
            browser version, the pages of our Service that you visit, the time and date of your visit, the time
            spent on those pages, unique device identifiers and other diagnostic data.
        </p>
        <h2 class="mt-110px">Tracking & Cookies Data</h2>
        <p class="mt-36px">
            We use cookies and similar tracking technologies to track the activity on our Service and hold certain
            information.
            <br /><br />
            Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies
            are sent to your browser from a website and stored on your device. Tracking technologies also used are
            beacons, tags, and scripts to collect and track information and to improve and analyze our Service.
            <br /><br />
            You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However,
            if you do not accept cookies, you may not be able to use some portions of our Service.
        </p>
        <h2 class="mt-110px">
            Examples of Cookies we use:
        </h2>
        <ul class="mt-36px">
            <li>
                Session Cookies. We use Session Cookies to operate our Service.
            </li>
            <li>
                Preference Cookies. We use Preference Cookies to remember your preferences and various settings.
            </li>
            <li>
                Security Cookies. We use Security Cookies for security purposes.
            </li>
        </ul>
        <h3 class="mt-82px">Use of Data</h3>
        <p class="mt-36px">Make Agency Limited uses the collected data for various purposes:</p>
        <ul class="mt-36px">
            <li>
                To provide and maintain the Service
            </li>
            <li>
                To notify you about changes to our Service
            </li>
            <li>
                To allow you to participate in interactive features of our Service when you choose to do so
            </li>
            <li>
                To provide customer care and support
            </li>
            <li>
                To provide analysis or valuable information so that we can improve the Service
            </li>
            <li>
                To monitor the usage of the Service
            </li>
            <li>
                To detect, prevent and address technical issues
            </li>
        </ul>

        <h3 class="mt-82px">Transfer Of Data</h3>
        <p class="mt-36px">
            Your information, including Personal Data, may be transferred to ??? and maintained on ??? computers located
            outside of your state, province, country or other governmental jurisdiction where the data protection
            laws may differ than those from your jurisdiction.
            <br /><br />
            If you are located outside United Kingdom and choose to provide information to us, please note that we
            transfer the data, including Personal Data, to United Kingdom and process it there.
            <br /><br />
            Your consent to this Privacy Policy followed by your submission of such information represents your
            agreement to that transfer.
            <br /><br />
            Make Agency Limited will take all steps reasonably necessary to ensure that your data is treated
            securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take
            place to an organization or a country unless there are adequate controls in place including the security
            of your data and other personal information.
        </p>

        <h3 class="mt-82px">Disclosure Of Data</h3>
        <p class="mt-36px">
            Legal Requirements
        </p>
        <p>
            Make Agency Limited may disclose your Personal Data in the good faith belief that such action is
            necessary to:
        </p>
        <ul>
            <li>
                To comply with a legal obligation
            </li>
            <li>
                To protect and defend the rights or property of Make Agency Limited
            </li>
            <li>
                To prevent or investigate possible wrongdoing in connection with the Service
            </li>
            <li>
                To protect the personal safety of users of the Service or the public
            </li>
            <li>
                To protect against legal liability
            </li>
            <li>
                Security Of Data
            </li>
        </ul>
        <p class="mt-36px">
            The security of your data is important to us, but remember that no method of transmission over the
            Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable
            means to protect your Personal Data, we cannot guarantee its absolute security.
        </p>
        <h3 class="mt-82px">Service Providers</h3>
        <p class="mt-36px">
            We may employ third party companies and individuals to facilitate our Service (???Service Providers???), to
            provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how
            our Service is used.
            <br /><br />
            These third parties have access to your Personal Data only to perform these tasks on our behalf and are
            obligated not to disclose or use it for any other purpose.
        </p>
        <h2 class="mt-90px">
            Analytics
        </h2>
        <p class="mt-36px">
            We may use third-party Service Providers to monitor and analyze the use of our Service.
        </p>
        <h2 class="mt-60px">
            Google Analytics
        </h2>
        <p class="mt-36px">
            Google Analytics is a web analytics service offered by Google that tracks and reports website traffic.
            Google uses the data collected to track and monitor the use of our Service. This data is shared with
            other Google services. Google may use the collected data to contextualize and personalize the ads of its
            own advertising network.
            <br /><br />
            You can opt-out of having made your activity on the Service available to Google Analytics by installing
            the Google Analytics opt-out browser add-on. The add-on prevents the Google Analytics JavaScript (ga.js,
            analytics.js, and dc.js) from sharing information with Google Analytics about visits activity.
            <br /><br />
            For more information on the privacy practices of Google, please visit the Google Privacy & Terms web
            page: https://policies.google.com/privacy?hl=en
        </p>
        <h3 class="mt-110px">
            Links To Other Sites
        </h3>
        <p class="mt-36px">
            Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party???s site. We strongly advise you to review the Privacy Policy of every site you visit.
            <br /><br />
            We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.
        </p>
        <h3 class="mt-60px">
            Children???s Privacy
        </h3>
        <p class="mt-36px">
            Our Service does not address anyone under the age of 18 (???Children???).
            <br /><br />
            We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.
        </p>
        <h3 class="mt-60px">
            Changes To This Privacy Policy
        </h3>
        <p class="mt-46px">
            We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
            <br /><br />
            We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the ???effective date??? at the top of this Privacy Policy.
            <br /><br />
            You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
        </p>
        <h3 class="mt-82px">
            Contact Us
        </h3>
        <p class="mt-36px">
            If you have any questions about this Privacy Policy, please contact us by visiting this page on our website: www.makeagency.co.uk/contact/
        </p>
    </div>
</section>


@include('layouts.site.sections.recent-posts')
@include('layouts.site.sections.review-client')

@endsection

@section('footer-section')
@endsection