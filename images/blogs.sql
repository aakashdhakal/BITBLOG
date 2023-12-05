-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers_data`
--

CREATE TABLE `followers_data` (
  `id` int(11) NOT NULL,
  `user_username` text NOT NULL,
  `author_username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `followers_data`
--

INSERT INTO `followers_data` (`id`, `user_username`, `author_username`) VALUES
(159, 'aayushdhakal', 'aakashdhakal');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_username` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug_url` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `category` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug_url`, `date`, `likes`, `comments`, `views`, `thumbnail`, `content`, `author`, `status`, `featured`, `category`) VALUES
(1, 'Mastering the Basics: A Comprehensive Guide to HTML for Beginners', '', '2023-12-01 15:49:38', 12, 0, 232434, 'images/test3.jpg', 'Introduction:\nIn the vast realm of web development, HTML (Hypertext Markup Language) stands as the foundational language that structures and presents content on the World Wide Web. For beginners venturing into the world of coding, understanding HTML is the crucial first step toward becoming a proficient web developer. In this article, we will explore HTML from its basics to essential advanced concepts, providing a comprehensive guide for beginners.\n\nChapter 1: Unveiling the Basics\nIn the first chapter, we delve into the fundamental building blocks of HTML. From understanding tags and elements to grasping the structure of an HTML document, beginners will gain insights into the syntax and organization that form the backbone of every web page.\n\nChapter 2: Documenting Content with Tags\nHTML uses tags to define various elements on a webpage. This chapter explores a plethora of HTML tags, each serving a unique purpose. From headings and paragraphs to images and links, readers will discover the diverse set of tags that bring content to life.\n\nChapter 3: Navigating HTML Attributes\nAttributes provide additional information about HTML elements, enhancing their functionality. This chapter elucidates the concept of attributes and how they are used to customize and modify HTML elements. Readers will learn how attributes contribute to creating dynamic and interactive web pages.\n\nChapter 4: Crafting Structured Layouts with HTML5\nHTML5, the latest version of HTML, introduces new elements that facilitate the creation of structured and semantically meaningful layouts. This chapter explores the semantic tags introduced in HTML5, such as header, nav, and article, providing a modern approach to structuring content.\n\nChapter 5: Mastering Forms and User Input\nWeb forms are crucial for user interaction and data collection. This chapter guides readers through the creation of forms, explaining form elements, input types, and form validation. Understanding forms is a key skill for developers looking to create dynamic and user-friendly websites.\n\nChapter 6: Linking Pages and Resources\nHyperlinks are the backbone of the internet, connecting web pages and resources. This chapter covers the art of linking within a page, between pages, and to external resources. Readers will learn the various hyperlinking techniques that contribute to seamless navigation.\n\nChapter 7: Embracing Multimedia: Images and Videos\nModern web pages are incomplete without engaging multimedia content. This chapter explores the integration of images and videos into HTML documents. Readers will understand the different attributes and techniques for embedding media elements.\n\nChapter 8: Going Beyond: Advanced HTML Concepts\nFor those ready to take their HTML skills to the next level, this chapter introduces advanced concepts. From understanding the Document Object Model (DOM) to incorporating meta tags for SEO, readers will gain insights into optimizing their HTML documents for the web.\n\nConclusion:\nMastering HTML is not just a technical skill; it\'s the foundation upon which every web developer builds their expertise. This comprehensive guide has equipped beginners with the knowledge needed to confidently navigate the HTML landscape. As they embark on their coding journey, they can now create well-structured, interactive, and visually appealing web pages. HTML is not just a language; it\'s the gateway to the boundless world of web development.', 'aakashdhakal', 1, 0, 'HTML'),
(2, 'Scala: Unleash The Power Of Functional and Object-Oriented Paradigms', '', '2023-11-25 13:18:09', 10000, 0, 34345345, 'images/test1.png', 'Scala is a modern programming language that combines the feature of Object Oriented language (Like JAVA, and C++) and Functional Programming (Like HASKELL) which makes it both unique and powerful. It was designed so that it would be scalable, expressive and concise. You don\'t have to write a verbose syntax like JAVA in Scala (Although knowing JAVA makes it far easier to learn Scala). Scala is made on top of JVM so all the methods that are available on JAVA will be available on Scala plus there will be more other methods. Scala is widely used in Big Data and other developments (like web development). Popular companies like Twitter and Coursera are written on Scala due to its flexibility and scalability.\r\n\r\nHistory of Scala\r\nScala combination of \"Scalable\" and \"Language\" was developed by Martin Odersky in 2003. It is a statically-typed language that runs on top of JVM (Java Virtual Machine), so it coordinates seamlessly with JAVA. Since it is scalable and has a very expressive syntax, it has gained popularity and is widely used to develop large and complex projects nowadays.\r\n\r\nFeatures of Scala\r\nObject-Oriented Programming: Everything in Scala is an object. Even the operators we use like /, *, +, - are objects. It also supports all the OOP features. So, it won\'t be wrong if we say that Scala is more Object Oriented than JAVA.\r\n\r\nFunctional Programming: Scala inherits functional programming which allows developers to write code using functions as first class citizens. Higher order functions, immutability, and many powerful collections of APIs make it awesome to work with. It also supports features like lambda expressions, closures and pattern matching.\r\n\r\nType inference: Scala has type inference, meaning that you don\'t have to specify the variable, or function type when declaring. The compiler automatically infers the type of the function and variables. (But you have to specify the return type of the function if you are using recursion which you most likely will and If you want to specify the type then you can there is no boundary)\r\n\r\nSemicolon: You don\'t need to give a semicolon at the end of each line to terminate the program. It works like Python where you can just indent the code. If you want to line multiple lines of code in a single line then a semicolon is a must.\r\n\r\nScalable: Scala is made to create highly scalable programs, So without any doubt, it is one of the most scalable languages out.\r\n\r\nPros\r\n1) Although Scala supports OOP, we can write pure FP which makes the code fast, easy to debug and scalable.\r\n\r\n2) We can build a highly stable concurrent system in Scala using the AKKA framework.\r\n\r\n3) The code is more concise, expressive and less verbose making it easier to read for developers.\r\n\r\n4) Since Scala runs on top of JAVA, its code run on any machine which supports JAVA.\r\n\r\n5) The libraries and frameworks are growing rapidly.\r\n\r\nCons\r\nIt has a steeper learning curve, so it may be difficult to learn.\r\n\r\nThere are not so lot of resources there to learn Scala. There are limited resources and you need to grind a lot to learn things.\r\n\r\nSince Scala programmer prefers to write code in FP, so many developers who are not familiar with the functional programming paradigm may find it confusing especially when side-effects are introduced.\r\n\r\nWhy you should learn Scala?\r\nThe reason is very simple, it is one of the highest-paid programming languages out there (according to stackoverflow 2023 survey). There is no doubt that Scala is going to be vastly used in the near future so learning it now will give you a kick start in the race. We can write a JS code from Scala since Scala supports scala.js, basically, TypeScript is the subset of JavaScript; Scala is the subset of TypeScript. So, you can do full-stack web development. AI is growing huge and basically, most people are ignoring the things that AI works on data and the data are also becoming huge and huge, so Scala is one of the most used languages for Big Data. Last but not least you get to experience both Functional Programming and Object Oriented Programming.', 'diwashmainali', 1, 0, 'Scala'),
(5, 'Quantum Computing: A Leap into the Future\n', '', '2023-11-26 12:27:04', 63, 0, 23545, 'images/test4.jpg', 'Introduction\nIn the ever-evolving realm of technology, quantum computing stands at the forefront as a revolutionary paradigm that has the potential to redefine the boundaries of computational power. Unlike classical computers that rely on bits as the fundamental unit of information, quantum computers harness the principles of quantum mechanics to operate with quantum bits or qubits, introducing a new era of computing capabilities.\n\nUnveiling the Quantum Basics\nSuperposition and Entanglement\nThe fundamental principles that distinguish quantum computing from classical computing are superposition and entanglement. Superposition allows qubits to exist in multiple states simultaneously, presenting a vast array of possibilities for computation. Entanglement, on the other hand, enables qubits to be interconnected in such a way that the state of one qubit instantaneously influences the state of another, regardless of the distance between them.\n\nThis unique combination of superposition and entanglement empowers quantum computers to process and analyze information at speeds and scales that were once deemed unattainable by classical counterparts.\n\nQuantum Supremacy\nOne of the key milestones in the development of quantum computing is the concept of quantum supremacy. Quantum supremacy refers to the point at which a quantum computer can perform a task that is practically impossible for classical computers to execute within a reasonable timeframe. Google\'s achievement of quantum supremacy in 2019 marked a significant leap, demonstrating the ability of a quantum processor, named Sycamore, to solve a specific problem faster than the most powerful classical supercomputers.\n\nApplications Across Industries\nOptimization and Simulation\nQuantum computing\'s impact extends across various industries, unlocking new possibilities and addressing complex problems. In the realm of optimization, quantum algorithms can efficiently solve optimization problems that arise in logistics, finance, and operations, leading to more streamlined processes and resource utilization.\n\nSimulation is another area where quantum computing shines. Quantum computers can simulate the behavior of molecules and materials at a level of detail that is practically impossible for classical computers. This capability holds promise for advancements in drug discovery, material science, and the understanding of complex chemical processes.\n\nMachine Learning and Artificial Intelligence\nThe marriage of quantum computing with machine learning and artificial intelligence presents a potent alliance. Quantum algorithms have the potential to enhance machine learning models, enabling faster and more accurate data analysis. Quantum machine learning algorithms can process vast datasets and recognize intricate patterns, paving the way for advancements in areas such as pattern recognition, image processing, and natural language understanding.\n\nOvercoming Challenges\nQuantum Coherence and Error Correction\nWhile the promises of quantum computing are profound, the technology is not without its challenges. Quantum coherence, the delicate state that allows qubits to exist in superposition, is susceptible to disturbances from the external environment. Maintaining coherence over an extended period is a significant challenge that researchers are actively addressing through error correction techniques and the development of fault-tolerant quantum processors.\n\nScalability and Hardware Development\nScalability is another hurdle in the path to widespread quantum computing adoption. Building large-scale, stable quantum processors that can handle complex computations is an ongoing challenge. Researchers are exploring various approaches, including different qubit technologies and architectures, to overcome these scalability issues and bring quantum computing into practical use.\n\nThe Future of Quantum Computing\nAs quantum computing continues to progress, the question arises: What does the future hold for this groundbreaking technology?\n\nQuantum Networking and Cryptography\nOne exciting prospect is the development of quantum networks. Quantum communication, facilitated by the principles of entanglement, could lead to the creation of ultra-secure communication channels. Quantum cryptography promises to revolutionize data security by utilizing the fundamental principles of quantum mechanics to enable secure communication that is theoretically immune to eavesdropping.\n\nHybrid Quantum-Classical Systems\nAnother avenue of exploration is the integration of quantum computing into hybrid systems. Hybrid quantum-classical systems leverage the strengths of both classical and quantum computing to address complex problems more efficiently. This approach acknowledges that quantum computers excel at certain tasks, while classical computers remain proficient in others.\n\nPractical Applications and Commercialization\nLooking further into the future, quantum computing is poised to transition from the realm of research laboratories to practical applications and commercialization. As the technology matures, we can expect to see quantum computers playing a vital role in solving real-world problems across industries.\n\nConclusion\nIn conclusion, quantum computing represents a paradigm shift that transcends the boundaries of classical computation. With the ability to process information at speeds and scales previously thought impossible, quantum computing opens doors to new frontiers of discovery and innovation. While challenges remain, the trajectory of progress in quantum computing is undeniably upward, promising a future where the impossible becomes achievable and the unimaginable becomes reality. As we navigate this quantum leap into the future, the transformative potential of quantum computing leaves us in eager anticipation of what lies ahead in the ever-evolving landscape of technology.', 'aakashdhakal', 1, 0, 'Technology'),
(7, 'Cybersecurity Trends: Safeguarding the Digital Frontier', 'cybersecurity-trends-safeguarding-the-digital-frontier', '2023-12-02 11:22:26', 100, 0, 3333, 'images/test5.jpg', 'In an era dominated by rapid technological advancements, the digital landscape is continually evolving. With every innovation comes the need for enhanced cybersecurity measures to safeguard against a growing array of threats. As we navigate the intricacies of our digital frontier, it is crucial to stay abreast of the latest cybersecurity trends shaping the future of digital security.\n\n1. Artificial Intelligence and Machine Learning in Cybersecurity\n\nOne of the most significant developments in cybersecurity is the integration of artificial intelligence (AI) and machine learning (ML) technologies. These innovations empower security systems to analyze vast amounts of data, identify patterns, and detect anomalies in real-time. AI and ML algorithms enhance threat detection, response, and mitigation, making it increasingly challenging for cybercriminals to exploit vulnerabilities.\n\n2. Zero Trust Security Models\n\nTraditionally, cybersecurity relied on perimeter-based defense systems, assuming that threats existed outside the network. However, the paradigm is shifting towards a \"Zero Trust\" model, which operates on the principle of trusting no one, even those within the network. This approach emphasizes strict access controls, continuous authentication, and constant monitoring, mitigating the risk of unauthorized access and lateral movement within the network.\n\n3. Cloud Security Evolution\n\nAs organizations migrate their operations to the cloud, ensuring robust cloud security becomes paramount. Cybersecurity trends now focus on enhancing cloud infrastructure protection, data encryption, and secure application development within cloud environments. With the adoption of multi-cloud strategies, cybersecurity experts are devising comprehensive solutions to address the unique challenges posed by diverse cloud ecosystems.\n\n4. Ransomware Resilience and Mitigation Strategies\n\nRansomware attacks have surged in scale and sophistication, prompting the need for resilient mitigation strategies. Cybersecurity professionals are adopting proactive measures such as regular data backups, employee training programs, and advanced endpoint protection. Additionally, threat intelligence sharing among organizations has become crucial in creating a united front against ransomware threats.\n\n5. Internet of Things (IoT) Security Measures\n\nThe proliferation of IoT devices introduces new entry points for cyber threats. The cybersecurity landscape is adapting to this challenge by incorporating stringent security measures for IoT devices. This includes encryption protocols, device identity management, and regular security updates. As smart homes, cities, and industries become more interconnected, safeguarding IoT infrastructure becomes integral to overall cybersecurity efforts.\n\n6. Biometric Authentication and Multi-Factor Authentication (MFA)\n\nTraditional username-password authentication is proving insufficient in the face of sophisticated cyber threats. Biometric authentication methods, such as fingerprint and facial recognition, add an extra layer of security by verifying users based on unique physiological characteristics. Multi-Factor Authentication (MFA), combining multiple authentication methods, further fortifies access controls, reducing the risk of unauthorized access.\n\n7. Quantum-Safe Cryptography\n\nWith the advent of quantum computing, the cryptographic algorithms that currently secure our digital communications may become vulnerable to quantum attacks. Cybersecurity experts are developing quantum-safe cryptographic solutions to withstand the computing power of quantum systems. Preparing for the post-quantum era is essential to maintaining the integrity and confidentiality of sensitive data.\n\nIn conclusion, the dynamic nature of the digital landscape necessitates continuous evolution in cybersecurity strategies. From harnessing the power of AI and ML to adopting a Zero Trust approach, staying ahead of cybersecurity trends is imperative for individuals, organizations, and governments alike. By embracing these trends and implementing robust security measures, we can fortify the digital frontier and create a safer online environment for all.', 'aakashdhakal', 1, 1, 'Cybersecurity'),
(8, 'Object, Class, Constructor & Static', '', '2023-12-02 11:18:11', 0, 0, 0, 'images/test2.png', 'Java program starts by making a class with the file name which has public access modifier. The concept of Classes and Objects is very simple. The object is the instance of the class. An object is created by using the new keyword. Before creating any object there should be the presence of a class. Object puts all the properties of the class in a single variable. That variable points towards the class. Since the object is made from the class it is known as an instance of the class. There are relationships between classes. They are:\r\n\r\n*1. Dependence (\"uses-a\")\r\n\r\nAggregation (\"has-a\")\r\nInheritance (\"is-a\")*\r\nClass is used to create a new datatype of your own choice which can be used to create objects later. When a new object is created then an actually new instance of the class is created. Objects are categorized by the three basic properties (State, Behaviour and Identity). They are described below:\r\n\r\n*1. State = How does the object react when you invoke the methods that are inside a class?\r\n\r\nBehaviour = What can you do with the object or what methods you can apply to it?\r\nIdentity = How can the object distinguish from other objects that may have the same behaviour and state?*\r\nAll the variables inside an Object are known as instance variables. Function in JAVA is known as methods.\r\n\r\nWhile calling a class from the object then we refer to the default constructer if no parameter is being passed. One class can have many constructors, this is known as overriding, but the constructor should take the unique values from the parameters. We are not allowed to make two constructors with the same parameters. If no constructor is made inside a class then the object will call the default constructor of the class which doesn\'t take input from the constructor.\r\n\r\nThe constructor has the same name as the class and a class can have multiple constructors which are known as overriding. Constructors can take any number of parameters, but there cannot be two constructors with the same datatype and the same number of parameters. A constructor doesn\'t return anything so it has no return type lastly constructor can be only called when the new keyword is attached to it, else it is unable to call the constructor. You cannot apply constructors to an existing object to reset an instance field. The code sample for the constructor is:\r\n\r\npublic Employee(String n , double s) {\r\n}\r\n\r\npublic Employee(double s) {\r\n\r\n}\r\n\r\n//The default constructor\r\n\r\npublic Employee() {\r\n}\r\nBlocks are used inside a class. Block is defined by using only curly braces like\r\n\r\n{\r\n// I am inside a block\r\n} The block can run many times, but a static block runs only one time when the object is first loaded into memory. The blocks run before any constructor runs, so the value that we want to set up exactly once while using that particular class is set inside a static block. Static block runs only one time when the class is first loaded into the memory.\r\nWhen a variable, method is set to static then it runs before any objects of its class is being created which makes it independent from the objects. This is the reason why main method is always declared static. The main method have access modifier of Public, static , have void return type and the name of the method is main which takes string array as an input. The static method belongs to a class not an object so the static variables & methods can only access another static variables & methods. It cannot access non-static variables & methods because they will be dependent on objects but non-static variables & methods can access both static and non-static variables. You can use non-static method inside a static method via creating a new object like:\r\n\r\npublic class Main {\r\npublic static void main(String[] args) {\r\ngreetings(); // If we call the non-static function inside a static function than it will result in an error\r\n\r\n// Accessing non-static function inside a static function\r\n\r\nMain obj = new Main(); // Creating an object named obj inside a Main class\r\nobj.greetings(); // Accessing the non-static function via object\r\n}\r\nvoid greetings(){\r\nSystem.out.println(\"Hello Diwash!\");\r\n}\r\n}\r\n\r\n', 'diwashmainali', 1, 0, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `profilepic` text NOT NULL,
  `email` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `role` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `followers` int(11) NOT NULL,
  `bio` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profilepic`, `email`, `firstname`, `lastname`, `role`, `is_admin`, `is_verified`, `followers`, `bio`) VALUES
(1, 'aakashdhakal', '$2y$10$l8LZJUq81Lzye78TlyRu2ejVLgSlZ11vXY5ZX7DG.OzFwBrg9qfqW', 'images/admin.jpeg', 'anamoldhakal@gmail.com', 'Aakash', 'Dhakal', 'author', 1, 1, 123456789, 'Passionate about all things tech, Aakash Dhakal is a tech enthusiast and writer on the cutting edge of innovation. With a love for unraveling the mysteries of emerging technologies, Aakash\'s articles offer insightful perspectives on the latest trends. Beyond tech, he advocates for ethical tech use. Join Aakash on a journey where imagination meets technology, redefining our digital frontier.\n\n\n\n\n\n'),
(3, 'diwashmainali', '$2y$10$D6aY8iDwo9KObjQD4/qi8eHytxXyyRWa8I4IkMFry1/jdofc.11CG', 'images/test1.jpg', 'diwash006@gmail.com', 'Diwash', 'Mainali', 'author', 0, 0, -1, 'He doesn\'t know he is the author'),
(4, 'Noroutine', '$2y$10$.zriNhG4Bcg9HgH5pBm3KO8gLzrlVeFO9vQfR4/u88IQTvc6sM.Fq', 'images/noimage.png', 'amardeeplimbu10@gmail.com', 'Amardeep', 'Limbu', 'author', 0, 0, 123, ''),
(5, 'amardeeplimbu', '$2y$10$7FCQcgy53xki646X3eOat..Z6Ksce3A8yQ0Htk3fMrBmLSQeSyqEG', 'images/aakashdhakal.png', 'helloworld@gmail.com', 'Amardeep', 'Limbu', 'author', 0, 0, 0, 'This is the test for the website'),
(6, 'swarupdahal', '$2y$10$yyg0hD5TTIsvQW3JSEyqauGImPMF2JqLeKMb.wxT7rYORle3QO3ba', 'images/noimage.png', 'hello@gmail.com', 'Swarup', 'Dahal', 'author', 0, 0, 457, 'hello world i want to fuck all of you in your ass'),
(23, 'helloword', '$2y$10$sZ2tnY/kUeuqjL8Hvxzk1.xM8z1/i80fs7M0NCx82e4NRmoHyM.vq', 'images/noimage.png', 'lezama@816qs.com', 'Aakash', 'Dhakal', '', 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `followers_data`
--
ALTER TABLE `followers_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `followers_data`
--
ALTER TABLE `followers_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
