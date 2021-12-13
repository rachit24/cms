-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 12:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(28, 'Technology'),
(29, 'Finance'),
(30, 'Life'),
(31, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(16, 28, 'Rachit Khurana', 'rachit@gmail.com', 'Loved the post! Amazing job by the  writer.', 'Approved', '2021-08-25'),
(17, 34, 'Rachit Khurana', 'rachit@gmail.com', 'So awesome!', 'Approved', '2021-08-25'),
(18, 35, 'Rachit Khurana', 'rachit@gmail.com', 'Great information\r\nnice', 'Approved', '2021-08-25'),
(19, 33, 'Rachit Khurana', 'rachit@gmail.com', 'informative', 'Approved', '2021-08-25'),
(20, 33, 'Rachit Khurana', 'rachit@gmail.com', 'nice knowledge\r\n', 'Approved', '2021-08-25'),
(21, 31, 'admin admin', 'admin@admin', 'wooooooohoooooooooooooooooooooooooooo', 'Approved', '2021-08-25'),
(22, 30, 'admin admin', 'admin@admin', 'arreee baap re XDDDDDDDDDD', 'Approved', '2021-08-25'),
(23, 31, 'Rachit Khurana', 'rachit@gmail.com', 'soooooooo awesomeeeeeeeeeeeeeeee', 'Approved', '2021-08-25'),
(24, 30, 'Rachit Khurana', 'rachit@gmail.com', 'bhai google bahot mast hai yar!', 'Approved', '2021-08-25'),
(25, 40, 'admin admin', 'admin@admin', 'yo', 'Approved', '2021-11-26'),
(26, 38, 'admin admin', 'admin@admin', 'hi', 'Approved', '2021-11-26'),
(27, 38, 'admin admin', 'admin@admin', 'bye', 'Approved', '2021-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(28, 28, '<p>Xiaomi moves away from its &#39;Mi&#39; product branding</p>\r\n', 'Sam Byfrod', '2021-08-25', 'tech1.jpg', '<p>Xiaomi is phasing out its &ldquo;Mi&rdquo; product branding, a spokesperson tells The Verge. Products including flagship smartphones like this year&rsquo;s Mi 11 will instead simply carry the Xiaomi name. The news was first reported by XDA Developers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;Starting in 2021 Q3, Xiaomi&rsquo;s product series &lsquo;Mi&rsquo; will be renamed to &lsquo;Xiaomi,&rsquo;&rdquo; says the spokesperson. &ldquo;This change will unify our global brand presence and close the perception gap between the brand and its products. This change may take some time to take effect in all regions.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Xiaomi says that it&rsquo;ll still keep the Redmi brand around, meaning that the higher-end Xiaomi products will form a distinct line alongside Redmi products. Xiaomi products &ldquo;represent the pinnacle of technology and offer a premium experience,&rdquo; according to the company, while Redmi products &ldquo;bring big innovation at a more accessible price point and are aimed at a younger audience.&rdquo;</p>\r\n', 'tech, technology, mobile, xiaomi, mi', 31, 'published', 0),
(30, 28, '<p>Google Meet now warns you when you are causing voice disturbance</p>\r\n', 'Jay Peters', '2021-08-25', 'tech2.jpg', '<p>Seems like Google has finally realised that it`s high time to make meetings more convenient by updating its video-communication service app that will now warn users with an alert message if it thinks they are creating an echo.</p>\r\n\r\n<p>The company announced the news in a blog post on Monday that the Google Meet app will soon tell you when it thinks you&#39;re creating an echo in calls.</p>\r\n\r\n<p>For the unversed, currently, the users of Meet stay unaware if they are creating an irritating echo for the meeting unless other participants interrupt to inform them. Now, presumably with this update, the meetings can be easier.</p>\r\n\r\n<p>As per The Verge, Google says that&nbsp;<a href=\"https://zeenews.india.com/technology/google-unveils-new-web-app-for-google-meet-check-how-to-install-it-2380542.html\" target=\"_top\">Meet</a>&nbsp;already controls audio to remove echo. But it can&#39;t account for all remote desktop speaker and microphone configurations that result in audio being fed back into the call.</p>\r\n\r\n<p>The new echo warning update will appear as both a red dot on the Meet interface as well as a notification and a text alert. The users can click the notification to get the steps of fixing the echo, which includes muting the microphone, lowering the speaker volume, or switching to headphones. The warnings will be enabled by default and won&#39;t require any admin intervention to enable.</p>\r\n\r\n<p>According to The Verge, Google says that the new echo warnings are rolling out now to Google Workspace and G Suite Basic and Business customers. The rollout will take nearly 15 days to complete.</p>\r\n', 'google, meet, class, online, meeting', 14, 'published', 0),
(31, 28, '<p>Watch the first trailer for Spider-Man: No Way Home</p>\r\n', 'Calvin Keith', '2021-08-25', 'tech3.jpg', '<p>After it&nbsp;<a href=\"https://www.hollywoodreporter.com/movies/movie-news/sony-block-alleged-spider-man-no-way-home-trailer-leak-1235001375/\" target=\"_top\">leaked</a>&nbsp;over the weekend, Sony Pictures has released the first official teaser trailer for the upcoming&nbsp;<em>Spider-Man: No Way Home</em>, the third Spider-Man movie to be part of the Marvel Cinematic Universe.</p>\r\n\r\n<p>I will just say up front that if you consider the basic premise of&nbsp;<em>No Way Home</em>&nbsp;to be a spoiler, you probably shouldn&rsquo;t watch this trailer. There are already reveals in it that big Spider-Man and Marvel fans might want to save for the theater, though I&rsquo;m not sure how practical that&rsquo;ll be in the lead-up to release.</p>\r\n\r\n<p>Suffice it to say for now that&nbsp;<em>No Way Home</em>&nbsp;follows on directly from the mid-credits scene in the last movie,&nbsp;<em>Far From Home</em>, which was released in 2019. Peter Parker is dealing with the fallout of being exposed as Spider-Man and, well, there is just a whole lot going on with that.</p>\r\n\r\n<p><em>Spider-Man: No Way Home</em>&nbsp;is set to be released on December 17th.</p>\r\n', 'movie, spiderman, marvel, multiverse, ', 8, 'published', 0),
(32, 29, '<p>How to Quit Your Job</p>\r\n', 'Dan Miller', '2021-08-25', 'fin1.webp', '<p>Ok, let&rsquo;s put it bluntly: You hate your job and can&rsquo;t wait to bid adieu to the toxic work culture, the lack of opportunity to move up, that creepy co-worker, the tone-deaf diversity initiatives. You&rsquo;ve got that seething &ldquo;I quit!&rdquo; email languishing in your drafts and you&#39;re this close to hitting send.</p>\r\n\r\n<p>But before you do, think about a little someone named Future You. Future You may gravely regret said seething email. In fact, let&rsquo;s just state it definitively: Future You will be desperately googling &ldquo;how to unsend an email.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It&rsquo;s true, when it&rsquo;s time to go, it&rsquo;s easy for emotions to get the best of you. But as Amelia Ransom, senior director of engagement and diversity for software company Avalara puts it: &ldquo;You only get to leave this job once, so set yourself up to leave well.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So whether you&rsquo;re transitioning to a more challenging role within another organization, leaving to further your education or taking some time off to Eat, Pray, Love, how you handle your relationship with your soon-to-be former employer can make &mdash; or break &mdash; your chances of future success. Here are some guidelines for navigating the final days of your job the right way, without burning bridges.</p>\r\n\r\n<p>Do: Start by talking to your direct supervisor.</p>\r\n\r\n<p>It turns out that managers don&rsquo;t love hearing about a report&rsquo;s departure plans at the water cooler. Whether you&#39;re quitting an office gig or a shift job, pay them due respect by scheduling a one-on-one chat to talk about your intentions. &ldquo;You shouldn&rsquo;t leave a position until you have spoken to your manager and perhaps your manager&rsquo;s manager about why you are thinking of leaving,&rdquo; says Andrew Gold, VP, Talent Management and HR Technology, at Pitney Bowes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whether you&rsquo;re thinking of leaving due to lack of development, an opportunity for more money, a higher role or the need for more flexibility, Gold has found that people are often surprised at some of the outcomes that result from these types of conversations.</p>\r\n\r\n<p>Take as much time as you need to reflect on what you learned or grew in your last role.</p>\r\n\r\n<p>That said, sometimes no amount of chatting can make a miserable job worth keeping. That&rsquo;s what Tessa D&rsquo;Agosta, a recently transitioned social media manager, learned early in 2020. &ldquo;It was a year that taught me quite blatantly about what I value and what I want,&rdquo; she explains. &ldquo;It both confirmed that my current situation was no longer working for me, and sort of paralyzed me against doing anything about it. So when something good arrived via my network, I took it.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Don&rsquo;t: Slack off as soon as you give notice.</p>\r\n\r\n<p>Until you descend the elevator for the last time, you&rsquo;re still an employee of your current company. And if you start rolling in at noon, skipping meetings or bad-mouthing your boss, your reputation as a reliable employee may suffer. (Future You will not be pleased). Plus, you&rsquo;ve been there: When someone leaves, their co-workers are left scrambling to pick up the extra load. So when your impending departure creates chaos, do your best to ease the transition.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;Try to complete as much outstanding work as possible and document the work you do to make the situation as easy as possible for the next person in the role,&rdquo; suggests Gold. A written summary of the work you perform, how you get the work done, who helps and a detailed listing of where files are stored can help, he adds.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Depending on where you work, closing the information loop can look quite different. However, it begins with solid communication with a superior, says Lessie E. Askew, Chief People Officer at New York&rsquo;s Callen-Lorde Community Health Center.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;Have a formal transition document with the supervisor that serves as both a negotiated document and an accountability document,&rdquo; she recommends. &ldquo;Use it almost as a table of contents to the projects you&rsquo;re working on and ensure the team has access to it.&rdquo; Askew urges people to outline key project deadlines, forthcoming milestones and progress to keep the team on track.</p>\r\n', 'job, quit, stress, finance', 9, 'published', 0),
(33, 29, '<p>Real Money Talk: How to Bring up Money with Friends</p>\r\n', 'Zina Kumok', '2021-08-25', 'fin2.jpg', '<p>Tough conversations with friends can be&hellip; well, tough. But often, it&rsquo;s the topics you avoid bringing up that cause the most damage. For most people, money problems are at the top of that list.</p>\r\n\r\n<p>Take it from someone who writes about money for a living &ndash; personal finance is not the most exciting topic. Beyond that, it can be embarrassing to admit when your money situation is less than ideal.</p>\r\n\r\n<p>But the only way to avoid financial friction in your relationships is to tackle the issue head on. It won&rsquo;t be easy, but we&rsquo;ll make it simple with these practical tips.</p>\r\n\r\n<h3><strong>Learn to Set Boundaries</strong></h3>\r\n\r\n<p>One of the most common problems among friends is when one person wants to spend more money than the other person is comfortable with. Set boundaries with your friend by explaining that you&rsquo;re on a budget and can&rsquo;t afford pricey activities as often as they can.</p>\r\n\r\n<p>The sooner you have this conversation, the sooner you&rsquo;ll feel better about the whole situation. If you procrastinate, you might start feeling resentful toward your friend and avoid making plans in the future.</p>\r\n\r\n<p>You don&rsquo;t have to share your exact salary or debt totals with your friend. Just explain that you need to spend less on eating out, going to the movies or whatever activity you typically do together. Be specific and break it down for them. If your friend earns much more than you or doesn&rsquo;t have student loans, they may not realize that spending $20 on brunch or $40 on concert tickets is a big deal for you.</p>\r\n\r\n<p>Your friend may feel awkward about suggesting activities for a while, not knowing if you can afford them. That&rsquo;s why it&rsquo;s important to suggest low-cost or free alternatives, like taking a walk around your neighborhood, hosting a potluck, or having a BYOB night at the park. This step is key because it reaffirms that you want to maintain the friendship, even if it means switching up your normal routine.</p>\r\n\r\n<p>It may seem easier to just avoid hanging out rather than bring up your money troubles, but this always backfires. Your friend will eventually think you just don&rsquo;t want to see them, and your relationship will begin to deteriorate. Don&rsquo;t let money be the reason you lose a friendship.</p>\r\n\r\n<h3><strong>Don&rsquo;t Assume Your Situation Is Unique</strong></h3>\r\n\r\n<p>Most of us assume that if you&rsquo;re not talking about money problems, you&rsquo;re doing just fine. But that&rsquo;s far from reality &ndash; and the Covid-19 pandemic has put more people than ever in a financial tight spot.</p>\r\n\r\n<p>According to a 2020 survey,&nbsp;<a href=\"https://www.cnbc.com/2020/12/11/majority-of-americans-are-living-paycheck-to-paycheck-since-covid-hit.html\" target=\"_blank\">63% of Americans</a>&nbsp;said they&rsquo;ve been living paycheck-to-paycheck. Even your friend who splurges on mani-pedis, takes Lyft rides everywhere, and just booked a long weekend to Cabo may be relying on a credit card to finance all her expenses.</p>\r\n\r\n<p>When you bring up your own financial struggles, it gives your friend permission to be vulnerable and share her own problems. Even if she&rsquo;s not dealing with the same issues, she may have gone through similar struggles in the past.</p>\r\n\r\n<h3><strong>Be Honest</strong></h3>\r\n\r\n<p>It sounds cliche, but being honest and open about your feelings is the first and most important step to take when talking about sensitive financial issues with your friends. If your friend is always bragging about their $10,000 bonus or judging people who shop at thrift stores, explain how their comments make you feel.</p>\r\n\r\n<p>Only bring up remarks they say directly to you or in your presence. Don&rsquo;t mention how their Instagram stories or Snapchat posts affect you. It&rsquo;s not fair to ask anyone to censor themselves on social media, but it&rsquo;s reasonable to expect a little restraint when you&rsquo;re hanging out.</p>\r\n\r\n<h3><strong>Brings Things Up Early</strong></h3>\r\n\r\n<p>The sooner you talk about what&rsquo;s bothering you, the better the conversation will go. For example, if your friend asks you to be in their wedding party and you&rsquo;re on a limited budget, tell them about any potential issues as soon as they ask. If you wait until they&rsquo;re already booking the bachelorette party and bridal shower, it may be too late for them to change anything.</p>\r\n\r\n<p>If your college friends want to plan a reunion trip to Las Vegas and you&rsquo;re still paying off credit card debt, tell them you can&rsquo;t afford to go before they book an Airbnb with you in mind. Your friends will likely try to accommodate you if they can, but only if you give them plenty of notice.</p>\r\n\r\n<h3><strong>When They Owe You Money</strong></h3>\r\n\r\n<p>Lending a friend money can feel like an easy favor in the short-term, but plenty of friendships have ended over an unpaid debt. If your friend owes you money and hasn&rsquo;t made any effort to pay you back, the only solution is to talk about it directly.</p>\r\n\r\n<p>Don&rsquo;t discuss this over text, where anything you say may appear passive-aggressive. Try to meet with them face-to-face or talk over the phone if you don&rsquo;t live nearby.</p>\r\n\r\n<p>Make it clear that you understand their situation and that you sympathize. If they can&rsquo;t pay back the full amount right now, tell them that you&rsquo;ll accept partial payments. Shame is the biggest reason why people avoid talking about money, so the goal is to make your friend feel comfortable enough to have a frank conversation about the debt.</p>\r\n\r\n<h3><strong>When You Make More</strong></h3>\r\n\r\n<p>If you&rsquo;re the friend who earns more, navigate money conversations carefully. You never know what someone&rsquo;s financial situation is really like, even if they&rsquo;re sharing specific details with you. Avoid giving your friends money advice unless they ask for it &ndash; or maybe if they complain about a certain topic endlessly.</p>\r\n\r\n<p>Don&rsquo;t automatically assume your friend can&rsquo;t afford to do something, but be respectful and understanding when they do opt out. You may be surprised at what they&rsquo;re willing to splurge on &ndash; especially if the activity is something they value highly</p>\r\n\r\n<p>Offer to do free or cheap activities if they seem hesitant to suggest alternatives. Even something simple like watching Netflix or cooking a meal together can be just as fun as a night out.</p>\r\n', 'friends, money, talk, finance', 13, 'published', 0),
(34, 29, '<p>Pros and Cons of Working From Home: Is It Better for You and Your Wallet?</p>\r\n', 'Rachit Khurana', '2021-08-25', 'fin3.jpg', '<p>Before the COVID-19 pandemic, working from home may have seemed like a perk that freelancers got to do &ndash; not everyone. Now, many more full-time employees have experienced working remotely due to employer-mandated safety requirements.</p>\r\n\r\n<p>If you recently joined the ranks of virtual staff due to the pandemic, your visions of the remote-working life may have been dashed by reality. Working from home may sound like an ideal situation, if you&#39;ve imagined simply rolling out of bed and arriving at your home office in moments, without the hassles of first making yourself presentable and then commuting to a workplace with a boss and&nbsp;<a href=\"https://money.usnews.com/money/blogs/outside-voices-careers/articles/kinds-of-annoying-co-workers-and-how-to-deal-with-them\">colleagues who may drive you crazy</a>.</p>\r\n\r\n<p>In reality, though, just like working in an office, remote work comes with pros and cons. The following pros and cons emerged after conducting informal interviews with more than 100 people with remote jobs. Read on for some positive aspects of telecommuting and the challenges that come with a work-from-home lifestyle.</p>\r\n\r\n<ul>\r\n	<li>Pro: More flexibility to take care of appointments and errands.</li>\r\n	<li>Con: No physical separation between work and leisure time.</li>\r\n	<li>Pro: Fewer interruptions from meetings and chitchat.</li>\r\n	<li>Con: Easy to misread cues via electronic communications.</li>\r\n	<li>Pro: No commute time or expense.</li>\r\n	<li>Con: You have to make the effort to get a change of scenery.</li>\r\n	<li>Pro: More time spent with family.</li>\r\n	<li>Con: Less in-person contact with co-workers.</li>\r\n	<li>Pro: You can often do your work when you&#39;re most productive.</li>\r\n	<li>Con: You are not on site for the in-office perks.</li>\r\n</ul>\r\n\r\n<h3>Pro: More flexibility to take care of appointments and errands.</h3>\r\n\r\n<p>One of the hardest things about committing to a 9-to-5 desk job is that it prevents you from being able to handle almost anything else that comes up in your life, whether attending a routine dentist appointment or picking a sick kid up from school. When you work from home, while you still have to meet your deadlines and be available when you say you will be, you generally have wider bandwidth to tend to other responsibilities without jeopardizing your job.</p>\r\n\r\n<h3>Con: No physical separation between work and leisure time.</h3>\r\n\r\n<p>Many who work from home lamented that they often find themselves working around the clock, since their labor has no definite start or end times; those lines can often be blurred. As a result, they sometimes feel as if they are always at work, making it difficult to shift to the post-work relaxation mode that many office workers take for granted.</p>\r\n\r\n<p>The absence of an obvious division between the personal and professional realms means some remote workers get distracted by housework. Setting boundaries and sticking to them is important when you&#39;re working from home.</p>\r\n\r\n<h3>Pro: There are fewer interruptions from meetings and chitchat.</h3>\r\n\r\n<p>It&#39;s easier to get into a deep state of focused work when you&#39;re in your home office without colleagues dropping by and sitting down impromptu to talk about their weekends. Limiting unnecessary interruptions from your colleagues and boss is a big plus of working from home and is one reason many remote workers are often more productive than office-based workers. While you may need to dial in for specific meetings, you&#39;ll likely get a break from attending several others &ndash; many of which may be unnecessary to your role &ndash; that confront staff workers daily.</p>\r\n\r\n<h3>Con: It&#39;s easy to misread cues via electronic communications.</h3>\r\n\r\n<p>While few who work from home expressed feeling &quot;lonely,&quot; as is typically assumed, many did point to the difficulty of getting the tone right through digital communication systems, such as email, chat, social media and text. Without body language, facial expressions and other cues, remote employees have to put in extra effort to maintain positive communications.</p>\r\n\r\n<h3>Pro: There is no commute time or expense.</h3>\r\n\r\n<p>You can save a lot of money and avoid wasting hours spent getting to and from work when your office is right down the hall.&nbsp;<a href=\"https://money.usnews.com/money/blogs/outside-voices-careers/articles/2017-10-31/how-to-make-your-commute-to-work-more-bearable\">Avoiding traffic battles</a>&nbsp;tops the list of benefits for some of those who work from home. Many remote workers also mentioned saving money by eschewing a&nbsp;<a href=\"https://money.usnews.com/money/careers/company-culture/articles/what-to-wear-to-work\">pricey professional wardrobe</a>&nbsp;unless they meet with clients.</p>\r\n\r\n<h3>Con: You have to make the effort to get a change of scenery.</h3>\r\n\r\n<p>What can be a blessing can also become a curse in the form of cabin fever. Some freelancers and others who work from home lamented that where they work during the day is the exact same place where they&#39;ll be sitting later that evening; getting involved in their work often translates to spending a huge portion of the day indoors. Pre-pandemic, many stressed the importance of scheduling lunches and other meetings to keep them in the mix and avoid the rut of never leaving the house.</p>\r\n\r\n<h3>Pro: More time spent with family.</h3>\r\n\r\n<p>While the &quot;con&quot; above of having blurred boundaries between work and leisure time can definitely create chaos, there&#39;s an upside for families: more time together. Office workers must kiss their loved ones goodbye each morning when heading off to work; not so for virtual workers, who can work side by side with a work-from-home spouse or&nbsp;<a href=\"https://money.usnews.com/careers/articles/how-to-work-remotely-while-home-schooling-your-kids\">with kids who are learning in a digital classroom</a>. By doing away with the commute time, there is more time to be spent with loved ones.</p>\r\n\r\n<h3>Con: There is less in-person contact with co-workers.</h3>\r\n\r\n<p>While you may have more time with loved ones when working from a home office, the flipside is less opportunity for face time (minus a screen) with people at your company. If your co-workers drive you crazy, then reduced time on-site might be a perk for you. But if you enjoy office-based camaraderie and like to be able to socialize with your team in person, then the remote life might make you miserable.</p>\r\n\r\n<h3>Pro: You can often do your work when you&#39;re most productive.</h3>\r\n\r\n<p>When you work in an office, your schedule is rarely your own. Between the aforementioned interruptions from colleagues and meetings, plus your boss hovering nearby with agenda items and to-dos, accomplishing your focus work may be a &quot;catch as catch can&quot; situation, grabbing time to think and compose important reports and communications between events that others have imposed.</p>\r\n\r\n<p>It&#39;s still always essential when working from home to be mindful of your team&#39;s needs and be available to dial in for virtual meetings. But remote employees generally have greater latitude to select their&nbsp;<a href=\"https://money.usnews.com/money/blogs/outside-voices-careers/articles/work-productivity-tips-for-remote-jobs\">time of peak productivity</a>&nbsp;to do their most important work and &ndash; depending on who else is working at home with them &ndash; have more quiet time to hone in on tasks that require concentration.</p>\r\n', 'work, home, money, finance, management', 6, 'published', 0),
(35, 30, '<p>What Anxiety Actually Is. It&#39;s More Than Just Worrying.</p>\r\n', 'Carl Edisson', '2021-08-25', 'life1.jpg', '<p>Lots of people are under the misapprehension that anxiety is simply another term for worrying about something, and that people with anxiety are simply making a big deal out of nothing. The truth, however, is far more terrifying. Those of us who suffer from anxiety know just how debilitating it really is. We know how crippling it can be, how it can make whole days, weeks, months, and years of our lives slip past in a grey blur, our strongest memory being that sinking, gnawing feeling we get in our gut that leaves us unable to fully enjoy life or feel the full spectrum of emotion that other people do.</p>\r\n', 'life, stress, anxiety, youth, truth', 8, 'published', 0),
(36, 30, '<p>Life is too short not to spend time with the people we love</p>\r\n', 'Mark Backer', '2021-08-25', 'life2.jpg', '<p>Life might seem like a long journey at times, but it is not. The older you get, the faster time seems to pass. Before you know it, it will be too late to spend time with the people you are close to. The chance will pass you by, and you will be left wishing you had handled things differently.</p>\r\n', 'memories, life, nostalgia, love, freedom, time', 9, 'published', 0),
(37, 31, '<p>Rediscover Thailand</p>\r\n', 'Mridula Dwedi', '2021-08-26', 'travel1.jpg', '<p>From the blissful beaches like Railay to the ancient relics, Thailand is the perfect destination for pleasure seekers.</p>\r\n\r\n<p>The sparkling Thailand nightlife, the delicious cuisine of Chiang Mai and appealing wildlife makes Thailand a top holiday destination. With many countries lifting lockdown restrictions, that much awaited dreamy getaway is now within reach. But wondering where to go?</p>\r\n\r\n<p>Tucked away from the mainland, you can live in beach-facing villas with private pools that have direct beach access, go scuba diving in crystal clear waters or just spend the afternoon walking along the shores of the beautiful coastline here. Peace, privacy, social distancing, protection from crowds, soul-soothing beauty whatever you need to forget the stress of 2020, Thailand&#39;s off-the-grid secluded islands promise to deliver!</p>\r\n', 'travel, world, thailand, journey, trip', 2, 'published', 0),
(38, 30, '<p>Lesser-Known Places in Asir That Will Inspire the Adventurer in You!</p>\r\n', 'Palak Bhatnagar', '2021-08-26', 'travel2.jpg', '<p>Seated quaintly, right between the misty mountains in the southern part of Saudi Arabia, is a region named Asir, filled with bespoke beauty.</p>\r\n\r\n<p>Offering a wealth of delights, Asir is a culturally and geographically rich destination, with plenty of places for all kinds of travellers. Here is a list of 9 lesser-known places in Asir that you must see to get inspired!</p>\r\n\r\n<p>1. Hang at the Hanging Village of Habalah</p>\r\n\r\n<p>The unique Hanging Village of Habalah sits along with the sheer cliffs of a rock&#39;s face in Saudi&#39;s Asir region. Neglected for decades, the village is accessible through a 300-foot long cable car. Explore the village by taking a tramway up and land amid the stony structures. In the current times, this magnificent attraction offers a pristine vantage point of the sprawling countryside. Snap pictures and bathe in serenity here</p>\r\n\r\n<p>2. Get Artsy at the Al Muftaha Village</p>\r\n\r\n<p>The sparkling village of Al Muftaha perfectly embodies the aesthetic spirit of Asir. As you stroll through its lanes, you can see the mosque, adorned with stunning calligraphy on the walls, encircled by a trail of modest but quirky art galleries that feature gorgeous artworks by regional and local artists. A perfect platform for local folks to showcase their creativity, the Al Muftaha Village exudes a great vibe and is a fabulous place to spend an amazing afternoon.</p>\r\n\r\n<p>3. Wriggle Away in Culture at Rijal</p>\r\n\r\n<p>Almaa Rijal Almaa, along with its charming mini fortress, is located on a hilltop. Sitting 45 km away from Abha, the village of Rijal Almaa has flourished over 350 years, becoming a UNESCO World Heritage Site. Check out the village museum that sits inside the six-story building and rolls out a brilliant repository of great art and history works in the form of artefacts and pictures. You could also catch an annual Flowerman Festival that exhibits the culture of the indigenous Aseri Tribe.</p>\r\n\r\n<p>4. Spike Up the Adrenaline in the Stunning Soudah Area!</p>\r\n\r\n<p>Perched at 3015 m above the sea-level, Soudah is abundant with juniper trees and is the outdoor adventure capital of Asir! It&#39;s a part of the Asir National Park, filled with hiking trails and markets. Guided camping trips and hiking are the typical activities here for all you adventure buffs! Adventure enthusiasts can also take a cable car ride from the top of Soudah to Rijal Almaa.</p>\r\n\r\n<p>5. Tickle Your Senses in Tanomah</p>\r\n\r\n<p>Nestled away in the Asir province at a high altitude, Tanomah is enveloped by beautiful juniper trees and rugged peaks, along with cascading waterfalls that sit right in the centre of the city! On the west side, the Al Sharaf Mountains is a hub for bird watchers, hikers, rock climbers and many adventure enthusiasts. The place where hues of red colour the peaks, one can find the rarest species of birds can there. Trek and take a respite at the warm Al Nakheel Restaurant that serves remarkable grilled meats. Else you can sample the buffet at Reef Tanomah! 6. Explore the Mud Wall , Shada Palace The Shada Palace is a mud-walled tower and home to traditional architecture that dates back to 1927 AD. It now houses a variety of local handicrafts and household items! You can climb onto the roof of the palace to see the high walls, which had ensured privacy in ancient times.</p>\r\n', 'stories, travel, asir, mountain, valley, beauty, asia, nature', 10, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`) VALUES
(34, 'admin', '$2y$12$U9GPlRZaCXhmhKFvW48FPutyXuGGOFICEMPmZGQzx2k7uQYrn8vSe', 'admin', 'admin', 'admin@admin', 'admin'),
(35, 'rk', '$2y$12$lTZUc.o11LbO2AR7NL.EAeMH7z91yQZIJY4aRxeMZPfWf4QSJmf.6', 'Rachit', 'Khurana', 'rachit@gmail.com', 'subscriber'),
(36, 'RK24', '$2y$12$HLqPXyltJegEY6RKSSzWveZHE5fKxgLPCEvNaF6AgXFSU.aQbr9J6', 'Rachit', 'Khurana', 'abcd@efg', 'subscriber'),
(44, 'feverish', '$2y$12$jGAUJIiiYkqx6FC3y9DWEu5gs07/KSRlyTw7RV0uMPuHZSTVyN0o2', 'feverish', 'feverish', 'adka@ja', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
