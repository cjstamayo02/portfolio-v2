import Hero from "@/components/Hero";
import Stats from "@/components/Stats";
import Impact from "@/components/Impact";
import Services from "@/components/Services";
import Projects from "@/components/Projects";
import About from "@/components/About";
import HowIWork from "@/components/HowIWork";
import WhoIWorkWith from "@/components/WhoIWorkWith";
import Experience from "@/components/Experience";
import Education from "@/components/Education";
import BlogPreview from "@/components/BlogPreview";
import Skills from "@/components/Skills";
import Contact from "@/components/Contact";
import {
  getBlogPosts,
  getEducation,
  getExperiences,
  getProfile,
  getProjects,
  getSkills,
} from "@/lib/api";

export default async function Home() {
  const [profile, projects, experiences, education, skills, posts] =
    await Promise.all([
      getProfile(),
      getProjects(),
      getExperiences(),
      getEducation(),
      getSkills(),
      getBlogPosts(),
    ]);

  return (
    <main>
      <Hero profile={profile} />
      <Stats stats={profile.stats} />
      <Impact title={profile.impact_title} items={profile.impact} />
      <Services services={profile.services} />
      <Projects projects={projects} />
      <About profile={profile} />
      <HowIWork items={profile.how_i_work} />
      <WhoIWorkWith audiences={profile.audiences} />
      <Experience experiences={experiences} />
      <Education items={education} />
      <BlogPreview posts={posts.slice(0, 3)} />
      <Skills skills={skills} />
      <Contact profile={profile} />
    </main>
  );
}
